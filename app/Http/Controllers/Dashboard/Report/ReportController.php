<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Repositories\ReportRepo;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    protected $reportRepo;

    public function __construct(ReportRepo $reportRepo)
    {
        $this->reportRepo = $reportRepo;
    }
    public function getReportData(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tab = $request->get('tab');
        $date = $request->input('date');
        $Today = Carbon::today();
        $totalProfitkey = "user:{$userId}:total_profit:{$Today}";
        $totalWithdrawalskey = "user:{$userId}:total_withdrawal:{$Today}";
        $totalProfit = Redis::get($totalProfitkey);
        $totalWithdrawals = Redis::get($totalWithdrawalskey);
        $earningToday = 0;
        $countryViewsKey = "user:{$userId}:country_views";
        $countries = Redis::zrange($countryViewsKey, 0, -1);
        foreach ($countries as $country) {
            $views = Redis::zscore($countryViewsKey, $country);
            $earningToday += $views;
        }

        $earningToday = intval($earningToday);
        switch ($date)
        {
            case 'today':
            case 'yesterday':
                $startDate = Carbon::parse($date);
                $endDate = Carbon::parse($date);
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
        $country = $request->input('country', null);

        if(isset($earningToday) && isset($totalProfit) && isset($totalWithdrawals)){
            return $data = [
                'title' => 'Report',
                'startDate' => $startDate,
                'endDate' => $endDate,
                'country' => $country,
                'tab' => $tab,
                'report' => $this->reportRepo->getAllData($userId, $tab, $startDate, $endDate, $country),
                'userWatching' => Redis::get("total:{$userId}") ?? 0,
                'totalProfit' => floatval($totalProfit),
                'totalWithdrawals' => floatval($totalWithdrawals),
                'payments' => $this->reportRepo->getPayment($userId),
                'earnings' => [
                    'today' => floatval($earningToday)*0.4,
                    'yesterday' => $this->reportRepo->getAllData($userId, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'],
                ],
            ];
        }
        $totalProfit = $this->reportRepo->where('user_id', $userId)->sum('revenue');
        $totalWithdrawals = Db::table('payment')->where('user_id', $userId)->sum('amount');
        $data = [
            'title' => 'Report',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'country' => $country,
            'tab' => $tab,
            'report' => $this->reportRepo->getAllData($userId, $tab, $startDate, $endDate, $country),
            'userWatching' => Redis::get("total:{$userId}") ?? 0,
            'totalProfit' => floatval($totalProfit),
            'totalWithdrawals' => floatval($totalWithdrawals),
            'payments' => $this->reportRepo->getPayment($userId),
            'earnings' => [
                'today' => floatval($earningToday)*0.4,
                'yesterday' => $this->reportRepo->getAllData($userId, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'],
            ],
        ];
        Redis::setex($totalProfitkey, 86400, $totalProfit);
        Redis::setex($totalWithdrawalskey, 86400, $totalWithdrawals);

        return $data;
    }

    public function index(Request $request)
    {
        $report = $this->getReportData($request);

        return view('dashboard.report.report', $report);
    }

    public function store(Request $request)
    {
        $report = $this->getReportData($request);
        $tab = $request->get('tab');
        if ($tab == 'date') {
            return view('dashboard.report.date', $report);
        } else {
            return view('dashboard.report.country', $report);
        }
    }


}
