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
        $today = Carbon::today();
        $totalProfitkey = "user:{$userId}:total_profit:{$today}";
        $totalWithdrawalskey = "user:{$userId}:total_withdrawal:{$today}";
        $totalProfit = Redis::get($totalProfitkey);
        $totalWithdrawals = Redis::get($totalWithdrawalskey);
        $earningToday = array_sum(array_map(function ($country) use ($userId) {
            return Redis::zscore("user:{$userId}:country_views", $country);
        }, Redis::zrange("user:{$userId}:country_views", 0, -1)));
        if($date == 'today'){
            $data_today = [
                [
                    'date' => $today->format('Y-m-d'),
                    'cpm' => 0.4,
                    'views' => $earningToday,
                    'download' => 0,
                    'paid_views' => 0,
                    'vpn_ads_views' => 0,
                    'revenue' => $earningToday*0.4
                ],
            ];
            $data['reports'] = collect(array_map(function ($item) {
                return (object) $item;
            }, $data_today));
        }else{
            $dateRange = $this->getDateRange($date, $request);
            $country = $request->input('country', null);
            $data['reports'] = $this->reportRepo->getAllData($userId, $tab, $dateRange['startDate'], $dateRange['endDate'], $country);
            $data['startDate'] = $dateRange['startDate'];
            $data['endDate'] = $dateRange['endDate'];
            $data['country'] = $country;
        }
        $data = array_merge($data ,[
            'title' => 'Report',
            'tab' => $tab,
            'userWatching' => Redis::get("total:{$userId}") ?? 0,
            'totalProfit' => floatval($totalProfit ?? $this->reportRepo->where('user_id', $userId)->sum('revenue')),
            'totalWithdrawals' => floatval($totalWithdrawals ?? Db::table('payment')->where('user_id', $userId)->sum('amount')),
            'payments' => $this->reportRepo->getPayment($userId),
            'earnings' => [
                'today' => floatval($earningToday)*0.4,
                'yesterday' => $this->reportRepo->getAllData($userId, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'] ?? 0,
            ],
        ]);

        Redis::setex($totalProfitkey, 86400, $data['totalProfit']);
        Redis::setex($totalWithdrawalskey, 86400, $data['totalWithdrawals']);

        return $data;
    }

    private function getDateRange($date, $request)
    {
        switch ($date)
        {
            case 'yesterday':
                $startDate = $endDate = Carbon::parse($date);
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

    public function index(Request $request)
    {
        $data = $this->getReportData($request);

        return view('dashboard.report.report', $data);
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
