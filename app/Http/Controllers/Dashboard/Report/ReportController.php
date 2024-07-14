<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Models\CountryTier;
use App\Repositories\ReportRepo;
use App\Repositories\CountryRepo;
use App\Repositories\AccountRepo;
use App\Http\Controllers\Controller;
use App\Services\StatisticService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    protected $reportRepo, $countryRepo, $accountRepo;

    public function __construct(ReportRepo $reportRepo, CountryRepo $countryRepo, AccountRepo $accountRepo)
    {
        $this->reportRepo = $reportRepo;
        $this->countryRepo = $countryRepo;
        $this->accountRepo = $accountRepo;
    }
    private function getDateRange($date, $request)
    {
        switch ($date)
        {
            case 'yesterday':
                $startDate = $endDate = Carbon::yesterday();
                break;
            case 'week':
                $startDate = Carbon::today()->subWeek();
                $endDate = Carbon::yesterday();
                break;
            case 'month':
                $startDate = Carbon::today()->subMonth();
                $endDate = Carbon::yesterday();
                break;
            default:
                $startDate = $request->input('startDate', Carbon::today()->subWeek());
                $endDate = $request->input('endDate', Carbon::yesterday());
        }

        return ['startDate' => $startDate, 'endDate' => $endDate];
    }

    public function getAllReportData(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $tab = $request->get('tab');
        $date = $request->input('date');
        $country = $request->input('country', null);
        $today = Carbon::today();
        $totalProfitkey = "user:{$userId}:total_profit";
        $totalWithdrawalskey = "user:{$userId}:total_withdrawal";
        $totalProfit = Redis::get($totalProfitkey);
        $totalWithdrawals = Redis::get($totalWithdrawalskey);
        $data_setting = $this->accountRepo->getSetting($userId);
        $earning = 0;
        if ($data_setting->earningModes == 1)
            $earning = 0.5;
        if ($data_setting->earningModes == 2)
            $earning = 1;
        $earningToday = StatisticService::calculateValue($userId, $earning);
        $data['title'] = 'Report';
        $data['userWatching'] = Redis::get("watching_users:{$userId}") ?? 0;
        $data['totalProfit'] = floatval($totalProfit ?? $this->reportRepo->where('user_id', $userId)->sum('revenue'));
        $data['totalWithdrawals'] = floatval($totalWithdrawals ?? Db::table('payment')->where('user_id', $userId)->sum('amount'));
        Redis::setex($totalProfitkey, 86400, $data['totalProfit']);
        Redis::setex($totalWithdrawalskey, 86400, $data['totalWithdrawals']);
        $dateRange = self::getDateRange($date, $request);
        if($date == 'today'){
            $data['startDate'] = $data['endDate'] = date("m/d/Y", strtotime($today));
        } else{
            $data['startDate'] = date("m/d/Y", strtotime($dateRange['startDate']));
            $data['endDate'] = date("m/d/Y", strtotime($dateRange['endDate']));
        }
        $data['countries'] = is_string($country) ? explode(',', $country) : [];
        $data['AllCountries'] = Redis::get('allCountries') ;
        if (isset($data['AllCountries'])){
            $data['AllCountries'] = unserialize($data['AllCountries']);
        }else{
            $data['AllCountries'] = CountryTier::all();
            Redis::set('allCountries', serialize(CountryTier::all()));
        }
        $data['payments'] = $this->reportRepo->getPayment($userId);
        $data['earnings'] = [
            'today' => floatval(array_sum($earningToday)),
            'yesterday' => $this->reportRepo->getAllData($userId, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'] ?? 0,
        ];
        if ($tab == 'date'){
            if($country == null){
                $data['reports'] = self::getDataDate($userId,$tab, $date ,$today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], null);
            }else{
                $data['reports'] = self::getDataCountry($userId,$tab, $date, $today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], $country,$data['AllCountries']);
            }
        } else{
            $data['reports'] = self::getDataCountry($userId,$tab, $date, $today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], $country, $data['AllCountries']);
        }
        return $data;
    }
    public function getDataDate($userId,$tab, $date,$today, $earningToday, $startDate, $endDate, $country)
    {
        if($date == 'today'){
            $data_today = [];
            $totalViews = 0;
            $countryViewsKeys = Redis::keys("total:{$today->format('Y-m-d')}:{$userId}:*");
            foreach ($countryViewsKeys as $key) {
                $views = Redis::get($key);
                $totalViews += $views;
            }
            $totalViews = intval($totalViews);
            $totalImpressionViews = 0;
            $totalImpression1 = Redis::keys("total_impression1:{$today->format('Y-m-d')}:{$userId}:*");
            $totalImpression2 = Redis::keys("total_impression2:{$today->format('Y-m-d')}:{$userId}:*");
            foreach ($totalImpression1 as $totalImpression1Key) {
                // Lấy số lượt xem của user từ khóa
                $views = Redis::get($totalImpression1Key);
                // Cộng số lượt xem vào tổng số lượt xem
                $totalImpressionViews += (int)$views;
            }
            foreach ($totalImpression2 as $totalImpression2Key) {
                // Lấy số lượt xem của user từ khóa
                $views = Redis::get($totalImpression2Key);
                // Cộng số lượt xem vào tổng số lượt xem
                $totalImpressionViews += (int)$views;
            }
            $cpm = $totalImpressionViews > 0 ? array_sum($earningToday) / $totalImpressionViews * 1000 : 0;
            $paid_views = $totalImpressionViews;
            $VpnAdsViews = $totalViews - $paid_views;
            $data_today[] = [
                    'date' => $today->format('Y-m-d'),
                    'cpm' => $cpm ,
                    'views' => $totalViews,
                    'download' => 0,
                    'paid_views' => $paid_views,
                    'vpn_ads_views' => $VpnAdsViews,
                    'revenue' => array_sum($earningToday)
            ];
            $data = collect(array_map(function ($item) {
                return (object) $item;
            }, $data_today));
        }else{
            $data = collect($this->reportRepo->getAllData($userId, $tab, $startDate, $endDate, $country))->map(function ($item) {
                return (object) $item;
            });
        }
        return $data;
    }

    public function getDataCountry($userId,$tab, $date,$today, $earningToday, $startDate, $endDate, $country, $AllCountries)
    {
        $data_today = [];
        if($date == 'today'){
            $filteredCountries = is_string($country) ? explode(',', $country) : $country;

            $countryViewsKeys = Redis::keys("total:{$today->format('Y-m-d')}:{$userId}:*");
            $indexedCountries = $AllCountries->keyBy('code');
            foreach ( $countryViewsKeys as $key) {
                $countryViews = Redis::get($key) ?? 0;
                $countryCode = explode(':', $key)[3];

                if ($filteredCountries !== null && !in_array($countryCode, $filteredCountries)) {
                    continue;
                }

                $getCountry = $indexedCountries->get($countryCode);

                if ($getCountry) {
                    $totalImpression1Views = Redis::get("total_impression1:{$today->format('Y-m-d')}:{$userId}:$countryCode") ?: 0;
                    $totalImpression2Views = Redis::get("total_impression2:{$today->format('Y-m-d')}:{$userId}:$countryCode") ?: 0;
                    $country_name = $getCountry->name ?? $countryCode;
                    $revenue = $earningToday[$countryCode] ?? 0;
                    $paidView = $totalImpression1Views + $totalImpression2Views;
                    $countryVpnAdsView = $countryViews - $paidView;
                    $countryDownload = 0;
                    $data_today[] = [
                        'date' => $today->format('Y-m-d'),
                        'country_name' => $country_name,
                        'views' => $countryViews,
                        'download' => $countryDownload,
                        'paid_views' => $paidView,
                        'vpn_ads_views' => $countryVpnAdsView,
                        'revenue' => $revenue,
                    ];
                }
            }
            $data = collect(array_map(function ($item) {
                return (object) $item;
            }, $data_today));
        }else{
            $data = collect($this->countryRepo->getAllDataCountry($tab,$startDate, $endDate, $userId, $country))->map(function ($item) {
                return (object) $item;
            });
        }

        return $data;
    }

    public function index(Request $request)
    {
        $tab = $request->get('tab');
        $data = $this->getAllReportData($request);
        return view('dashboard.report.report', $data);
    }

    public function store(Request $request)
    {

        $tab = $request->get('tab');
        $report = $this->getAllReportData($request);
        if ($tab == 'date') {
            $view = view('dashboard.report.date', $report)->render();
        } else {
            $view = view('dashboard.report.country', $report)->render();
        }

        return response()->json([
            'data' => $report,
            'view' => $view,
        ]);
    }


}
