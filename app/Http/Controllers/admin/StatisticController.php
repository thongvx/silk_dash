<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CountryTier;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Admin\StatisticRepo;
use App\Repositories\AccountRepo;
use App\Services\StatisticService;


class StatisticController extends Controller
{
    protected $svStreamService;
    protected $statisticRepo;
    protected $accountRepo;

    public function __construct(SvStreamService $svStreamService, StatisticRepo $statisticRepo, AccountRepo $accountRepo)
    {
        $this->svStreamService = $svStreamService;
        $this->accountRepo = $accountRepo;
        $this->statisticRepo = $statisticRepo;
    }
    private function getDateRange($date,$today, $request)
    {
        switch ($date)
        {
            case 'yesterday':
                $startDate = $endDate = Carbon::yesterday();
                break;
            case 'week':
                $startDate = Carbon::today()->subWeek();
                $endDate = Carbon::today();
                break;
            case 'month':
                $startDate = Carbon::today()->subMonth();
                $endDate = Carbon::today();
                break;
            default:
                $startDate = $request->input('startDate', Carbon::today()->subWeek());
                $endDate = $request->input('endDate', Carbon::today());
        }
        if($date == 'today'){
            $data['startDate'] = $data['endDate'] = $today;
        } else{
            $data['startDate'] = date("m/d/Y", strtotime($startDate));
            $data['endDate'] = date("m/d/Y", strtotime($endDate));
        }
        return $data;
    }
    // Get total profit and total withdrawals
    private function dataTotalReport($today){
        $cacheKey = "total_balance:{$today}";
        $data['totalBalance'] = Redis::get($cacheKey);
        $data['totalWithdrawals'] = Payment::sum('amount');
        if (!$data['totalBalance']) {
            $data['totalBalance'] = $this->statisticRepo->sum('revenue') - Payment::sum('amount');
            Redis::setex($cacheKey, 43200, $data['totalBalance']); // Cache for 12 hours
        } else {
            $data['totalBalance'] = floatval($data['totalBalance']);
        }
        return $data;
    }
    private function country($country){
        $data['countries'] = is_string($country) ? explode(',', $country) : [];
        $data['AllCountries'] = Redis::get('allCountries') ;
        if (isset($data['AllCountries'])){
            $data['AllCountries'] = unserialize($data['AllCountries']);
        }else{
            $data['AllCountries'] = CountryTier::all();
            Redis::set('allCountries', serialize(CountryTier::all()));
        }
        return $data;
    }
    // Get all report data
    private function getAllReportData(Request $request){
        $tab = $request->get('tab', 'date');
        $date = $request->input('date');
        $country = $request->input('country', null);
        $today = Carbon::today()->toDateString();
        $data = [];
        $data['title'] = 'Statistic';
        $data = array_merge($data, self::dataTotalReport($today));
        $statisticService = new StatisticService($this->accountRepo);
        $earningToday = $statisticService->calculateTotalEarnings($today);
        $data = array_merge($data, self::getDateRange($date, $today, $request));
        $data = array_merge($data, self::country($country));
        if($tab == 'date'){
            $data['column'] = $request->get('column', 'date');
        }else{
            $data['column'] = $request->get('column', 'country_name');
        }
        $data['direction'] = $request->get('direction', 'desc');
        $data['earnings'] = [
            'yesterday' => $this->statisticRepo->getAllData('date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'] ?? 0,
        ];
        if ($tab == 'date'){
            if($country == null){
                $data['reports'] = self::getDataDate($tab, $date ,$today, $earningToday, $data['startDate'], $data['endDate']);
            }else{
                $data['reports'] = self::getDataCountry($tab, $date, $today, $earningToday, $data['startDate'], $data['endDate'], $country,$data['AllCountries']);
            }
        } else{
            $data['reports'] = self::getDataCountry($tab, $date, $today, $earningToday, $data['startDate'], $data['endDate'], $country, $data['AllCountries']);
        }
        $dataCollection = collect($data['reports']);

        if ($data['direction'] === 'asc') {
            $data['reports'] = $dataCollection->sortBy($data['column']);
        } else {
            $data['reports'] = $dataCollection->sortByDesc($data['column']);
        }
        return $data;
    }
    private function getDataDate($tab, $date,$today, $earningToday, $startDate, $endDate)
    {

        if(Carbon::parse($endDate)->format('Y-m-d') == $today){
            $data_today = [];
            $totalViewsKey = Redis::keys("total_user_views:{$today}:*");
            if($totalViewsKey){
                $total = Redis::mget($totalViewsKey);
            }
            $totalViews = array_sum($total ?? []) ?? 0;
            $script = <<<LUA
                local totalSum = 0
                local cursor = '0'

                -- Scan for total_impression1 and total_impression2 keys in one scan loop
                repeat
                    local scanResult = redis.call('SCAN', cursor, 'MATCH', 'total_impression*:'..ARGV[1]..':*')
                    cursor = scanResult[1]
                    for _, key in ipairs(scanResult[2]) do
                        totalSum = totalSum + tonumber(redis.call('GET', key) or 0)
                    end
                until cursor == '0'

                return totalSum
            LUA;

            $totalImpressionViews = Redis::eval($script, 0, $today);

            $cpm = $totalImpressionViews > 0 ? $earningToday / $totalImpressionViews * 1000 : 0;
            $paid_views = $totalImpressionViews;
            $VpnAdsViews = $totalViews - $paid_views;
            $data_today[] = [
                'date' => $today,
                'cpm' => $cpm ,
                'views' => $totalViews,
                'download' => 0,
                'paid_views' => $paid_views,
                'vpn_ads_views' => $VpnAdsViews,
                'revenue' => $earningToday
            ];
            if($date == 'today'){
                $data = collect(array_map(function ($item) {
                    return (object) $item;
                }, $data_today));
            }else{
                $data = collect($this->statisticRepo->getAllData($tab, $startDate, $endDate))->map(function ($item) use ($data_today, $today) {
                    $item = (object) $item;
                    if ($item->date == $today) {
                        $item->cpm = $data_today[0]['cpm'];
                        $item->views = $data_today[0]['views'];
                        $item->download = $data_today[0]['download'];
                        $item->paid_views = $data_today[0]['paid_views'];
                        $item->vpn_ads_views = $data_today[0]['vpn_ads_views'];
                        $item->revenue = $data_today[0]['revenue'];
                    }
                    return (object) $item;
                });
            }
        }else{
            $data = collect($this->statisticRepo->getAllData($tab, $startDate, $endDate))->map(function ($item) {
                return (object) $item;
            });
        }
        return $data;
    }
    private function getDataTodayCountry($today,$country, $earningToday, $AllCountries){
        $data_today = [];

        $filteredCountries = is_string($country) ? explode(',', $country) : $country;

        // Lấy tất cả các keys liên quan đến views theo ngày
        $countryViewsKeys = Redis::keys("total:{$today}:*");
        $uniqueCountries = array_unique(array_map(function($key) {
            return explode(":", $key)[3]; // Trích xuất mã quốc gia
        }, $countryViewsKeys));

        if ($filteredCountries) {
            $uniqueCountries = array_intersect($uniqueCountries, $filteredCountries);
        }

        $indexedCountries = $AllCountries->keyBy('code');
        $chunks = array_chunk($uniqueCountries, 50); // Chia nhỏ theo chunk để tránh quá tải

        foreach ($chunks as $chunk) {
            $luaScript = <<<LUA
        local result = {}
        for i, countryCode in ipairs(KEYS) do
            local totalViews = 0
            local totalImpression1 = 0
            local totalImpression2 = 0

            -- Lấy các keys cho từng country
            local viewKeys = redis.call('KEYS', 'total:' .. ARGV[1] .. ':*:' .. countryCode)
            local impression1Keys = redis.call('KEYS', 'total_impression1:' .. ARGV[1] .. ':*:' .. countryCode)
            local impression2Keys = redis.call('KEYS', 'total_impression2:' .. ARGV[1] .. ':*:' .. countryCode)

            -- Lấy giá trị của các keys và tính tổng
            if #viewKeys > 0 then
                local viewValues = redis.call('MGET', unpack(viewKeys))
                for _, v in ipairs(viewValues) do
                    totalViews = totalViews + tonumber(v or 0)
                end
            end

            if #impression1Keys > 0 then
                local impression1Values = redis.call('MGET', unpack(impression1Keys))
                for _, v in ipairs(impression1Values) do
                    totalImpression1 = totalImpression1 + tonumber(v or 0)
                end
            end

            if #impression2Keys > 0 then
                local impression2Values = redis.call('MGET', unpack(impression2Keys))
                for _, v in ipairs(impression2Values) do
                    totalImpression2 = totalImpression2 + tonumber(v or 0)
                end
            end

            table.insert(result, {countryCode, totalViews, totalImpression1, totalImpression2})
        end
        return result
        LUA;
            $args = [$today];
            $results = Redis::eval($luaScript, count($chunk), ...$chunk, ...$args);

            foreach ($results as $result) {
                [$countryCode, $countryViews, $totalImpression1KeysResult, $totalImpression2KeysResult] = $result;

                $totalImpressionViews = $totalImpression1KeysResult + $totalImpression2KeysResult;
                $getCountry = $indexedCountries->get($countryCode);
                $country_name = $getCountry->name ?? $countryCode;
                $revenue = $earningToday[$countryCode] ?? 0;
                $paidView = $totalImpressionViews;
                $countryVpnAdsView = $countryViews - $paidView;

                $data_today[] = [
                    'date' => $today,
                    'country_name' => $country_name,
                    'views' => $countryViews,
                    'download' => 0, // Hiện tại mặc định là 0, bạn có thể điều chỉnh nếu cần
                    'paid_views' => $paidView,
                    'vpn_ads_views' => $countryVpnAdsView,
                    'revenue' => $revenue,
                    'cpm' => $countryViews > 0 ? $revenue / $countryViews * 1000 : 0,
                ];
            }
        }

        return $this->sumDataToday($data_today);
    }

    private function getDataCountry($tab, $date,$today, $earningToday, $startDate, $endDate, $country, $AllCountries)
    {

        if(Carbon::parse($endDate)->format('Y-m-d') == $today){
            $data_today_sum = self::getDataTodayCountry($today, $country, $earningToday, $AllCountries);
            if($date == 'today') {
                $data = array_map(function ($item) {
                    return (object) $item;
                }, $data_today_sum);
            }else{
                if($country == null){
                    $data = collect($this->statisticRepo->getAllDataCountry($tab,$startDate, $endDate, $country))->map(function ($item) use ($data_today_sum, $tab) {
                        $item = (object) $item;
                        foreach ($data_today_sum as $data) {
                            if($item->country_name == $data['country_name']){
                                $item->views += $data['views'];
                                $item->download += $data['download'];
                                $item->paid_views += $data['paid_views'];
                                $item->vpn_ads_views += $data['vpn_ads_views'];
                                $item->revenue += $data['revenue'];
                            }
                        }

                        return $item;
                    });
                    $existingCountryNames = $data->pluck('country_name')->toArray();
                    foreach ($data_today_sum as $dataItem) {
                        if (!in_array($dataItem['country_name'], $existingCountryNames)) {
                            $data->push((object) $dataItem);
                        }
                    }
                } else{
                    $data = collect($this->statisticRepo->getAllDataCountry($tab,$startDate, $endDate, $country))->map(function ($item) {
                        return (object) $item;
                    });
                    $data = $data->merge(collect([$data_today_sum])->map(function ($item) {
                        return (object) $item;
                    }));
                }

            }
        }else{
            $data = collect($this->statisticRepo->getAllDataCountry($tab,$startDate, $endDate, $country))->map(function ($item) {
                return (object) $item;
            });
        }
        return $data;
    }

    public function index( Request $request )
    {
        $tab = $request->input('tab', 'user');
        $data = $this->getAllReportData($request, $tab);
        // Get the total number of transfers
        return view('admin.statistic.statistic', $data);
    }
    public function store(Request $request)
    {

        $tab = $request->get('tab');
        $report = $this->getAllReportData($request);
        if ($tab == 'date') {
            $view = view('admin.statistic.date', $report)->render();
        } else {
            $view = view('admin.statistic.country', $report)->render();
        }
        return response()->json([
            'data' => $report,
            'view' => $view,
        ]);
    }

    public function statisticController(Request $request)
    {
        $tab = $request->input('tab');
        return $this->getData($request, $tab);
    }
    private function dataUser(){
        $today = Carbon::today()->format('Y-m-d');
        $allKeys = Redis::keys("total_user_views:{$today}:*");
        $scores = [];

        foreach ($allKeys as $key) {
            $userId = explode(':', $key)[2];
            $scores[str_replace("total_user_views:{$today}:", '', $key)] = [
                'views' => Redis::get($key) ?? 0,
                'name' => User::find($userId)->name,
            ];
        }
        arsort($scores);
        $topUsers = array_slice($scores, 0, 10, true);

        return $topUsers;
    }
}
