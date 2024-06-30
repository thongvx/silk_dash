<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepo;
use App\Repositories\VideoRepo;
use App\Repositories\ReportRepo;
use App\Http\Controllers\Dashboard\VideoController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\Statistic\StatisticController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class HomeController extends Controller
{
    protected $notificationRepo, $statisticController, $videoRepo, $reportRepo, $videoController;

    public function __construct(NotificationRepo $notificationRepo, StatisticController $statisticController,
                                VideoRepo $videoRepo, ReportRepo $reportRepo, VideoController $videoController)
    {
        $this->notificationRepo = $notificationRepo;
        $this->statisticController = $statisticController;
        $this->videoRepo = $videoRepo;
        $this->reportRepo = $reportRepo;
        $this->videoController = $videoController;
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $data['userWatching'] = Redis::get("watching_users:{$user->id}") ?? 0;
        $data['totalFile'] = $user->video;
        $totalProfitkey = "user:{$user->id}:total_profit";
        $data['totalProfit'] = floatval(Redis::get($totalProfitkey) ?? $this->reportRepo->where('user_id', $user->id)->sum('revenue'));
        $totalWithdrawalskey = "user:{$user->id}:total_withdrawal";
        $data['totalWithdrawals'] = floatval(Redis::get($totalWithdrawalskey) ?? Db::table('payment')->where('user_id', $user->id)->sum('amount'));
        Redis::setex($totalProfitkey, 86400, $data['totalProfit']);
        Redis::setex($totalWithdrawalskey, 86400, $data['totalWithdrawals']);
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        $data['topVideos'] = $this->statisticController->topVideo();
        $data['topCountries'] = $this->statisticController->topCountry();
        $data['storage'] = $this->videoController->convertFileSize($user->storage);
        $today = Carbon::today();
        $earningToday = 0;
        $countryViewsKey = "user:{$user->id}:country_views:{$today->format('Y-m-d')}";
        $countries = Redis::zrange($countryViewsKey, 0, -1);
        foreach ($countries as $country) {
            $views = Redis::zscore($countryViewsKey, $country);
            $earningToday += $views;
        }
        $monthData = $this->reportRepo->getAllData($user->id, 'date', Carbon::tomorrow()->subMonth(), $today, null);
        $data['dates'] = [
            'day' => $earningToday*0.4/1000,
            'month' => $monthData->map(function($item, $index) use ($earningToday) {
                return $index === 0 ? $earningToday : $item['views'];
            }),
            'week' => $monthData->map(function($item, $index) use ($earningToday) {
                return $index === 0 ? $earningToday : $item['views'];
            })->slice(0, 7),
        ];
        $data['earnings'] = [
            'today' => $earningToday*0.4/1000,
            'yesterday' => $monthData->filter(function($item) {
                return $item['date'] == Carbon::yesterday()->format('Y-m-d');
            })[0]['revenue'] ?? 0,
            '2days' => $monthData->filter(function($item) {
                    return $item['date'] == Carbon::today()->subDay(2)->format('Y-m-d');
                })[0]['revenue'] ?? 0,
        ];
        return view('dashboard.index', $data);
    }
}
