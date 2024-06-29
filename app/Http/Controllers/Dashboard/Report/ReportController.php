<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Models\CountryTier;
use App\Repositories\ReportRepo;
use App\Repositories\CountryRepo;
use App\Http\Controllers\Controller;
use App\Services\StatisticService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    protected $reportRepo, $countryRepo;

    public function __construct(ReportRepo $reportRepo, CountryRepo $countryRepo)
    {
        $this->reportRepo = $reportRepo;
        $this->countryRepo = $countryRepo;
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
        $earningToday = array_sum(array_map(function ($country) use ($userId, $today) {
            return Redis::zscore("user:{$userId}:country_views:{$today->format('Y-m-d')}", $country);
        }, Redis::zrange("user:{$userId}:country_views:{$today->format('Y-m-d')}", 0, -1)));
        $data['title'] = 'Report';
        $data['tab'] = $tab;
        $data['userWatching'] = Redis::get("watching_users:{$userId}") ?? 0;
        $data['totalProfit'] = floatval($totalProfit ?? $this->reportRepo->where('user_id', $userId)->sum('revenue'));
        $data['totalWithdrawals'] = floatval($totalWithdrawals ?? Db::table('payment')->where('user_id', $userId)->sum('amount'));
        Redis::setex($totalProfitkey, 86400, $data['totalProfit']);
        Redis::setex($totalWithdrawalskey, 86400, $data['totalWithdrawals']);
        $dateRange = self::getDateRange($date, $request);
        $data['startDate'] = $dateRange['startDate'];
        $data['endDate'] = $dateRange['endDate'];
        $data['countries'] = explode(',', $country);
        $data['AllCountries'] = collect(Redis::get('allCountries') ?? CountryTier::all());
        $data['payments'] = $this->reportRepo->getPayment($userId);
        $data['earnings'] = [
            'today' => floatval($earningToday) * 0.4,
            'yesterday' => $this->reportRepo->getAllData($userId, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'] ?? 0,
        ];
        if ($tab == 'date'){
            if($country == null){
                $data['reports'] = self::getDataDate($userId,$tab, $date ,$today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], null);
            }else{
                $data['reports'] = self::getDataCountry($userId,$tab, $date, $today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], $country);
            }
        } else{
            $data['reports'] = self::getDataCountry($userId,$tab, $date, $today, $earningToday, $dateRange['startDate'], $dateRange['endDate'], $country);
        }
        return $data;
    }
    public function getDataDate($userId,$tab, $date,$today, $earningToday, $startDate, $endDate, $country)
    {
        if($date == 'today'){
            $data_today = [
                [
                    'date' => $today->format('Y-m-d'),
                    'cpm' => 0.4,
                    'views' => $earningToday,
                    'download' => 0,
                    'paid_views' => 0,
                    'vpn_ads_views' => 0,
                    'revenue' => $earningToday*0.4/1000
                ],
            ];
            $data= collect(array_map(function ($item) {
                return (object) $item;
            }, $data_today));
        }else{
            $data = collect($this->reportRepo->getAllData($userId, $tab, $startDate, $endDate, $country))->map(function ($item) {
                return (object) $item;
            });
        }
        return $data;
    }

    public function getDataCountry($userId,$tab, $date,$today, $earningToday, $startDate, $endDate, $country)
    {
        if($date == 'today'){
            $valueArr = StatisticService::calculateValue($userId);
            $data_today = [];
            foreach ($valueArr as $country => $revenue) {
                $viewsKey = "total:{$userId}:{$country}";
                $countryViews = Redis::get($viewsKey);
                $countryViews = $countryViews ?: 0;
                $countryvpnAdsView = 0;
                $countrydownload = 0;
                $paidView = ($countryViews - $countryvpnAdsView) + $countrydownload;
                $data_today[] = [
                    'country_name' => $country,
                    'cpm' => $revenue / $countryViews * 1000,
                    'views' => $countryViews,
                    'download' => $countrydownload,
                    'paid_views' => $paidView,
                    'vpn_ads_views' => $countryvpnAdsView,
                    'revenue' => $revenue,
                ];
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
            return view('dashboard.report.date', $report);
        } else {
            return view('dashboard.report.country', $report);
        }
    }


}
