<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepo;
use App\Repositories\VideoRepo;
use App\Repositories\ReportRepo;
use App\Repositories\AccountRepo;
use App\Http\Controllers\Dashboard\VideoController;
use App\Services\StatisticService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\Statistic\StatisticController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class HomeController extends Controller
{
    protected $notificationRepo, $statisticController, $videoRepo, $reportRepo, $videoController, $accountRepo;

    public function __construct(NotificationRepo $notificationRepo, StatisticController $statisticController,
                                VideoRepo $videoRepo, ReportRepo $reportRepo, VideoController $videoController, AccountRepo $accountRepo)
    {
        $this->notificationRepo = $notificationRepo;
        $this->statisticController = $statisticController;
        $this->videoRepo = $videoRepo;
        $this->reportRepo = $reportRepo;
        $this->videoController = $videoController;
        $this->accountRepo = $accountRepo;
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $today = Carbon::today();
        $data['userWatching'] = Redis::get("watching_users:{$user->id}") ?? 0;
        $data['totalFile'] = $user->video;
        $totalProfitkey = "user:{$user->id}:total_profit:{$today->format('Y-m-d')}";
        $data['totalProfit'] = floatval(Redis::get($totalProfitkey) ?? $this->reportRepo->where('user_id', $user->id)->sum('revenue'));
        $totalWithdrawalskey = "user:{$user->id}:total_withdrawal:{$today->format('Y-m-d')}";
        $data['totalWithdrawals'] = floatval(Redis::get($totalWithdrawalskey) ?? Db::table('payment')->where('user_id', $user->id)->sum('amount'));
        Redis::setex($totalProfitkey, 86400, $data['totalProfit']);
        Redis::setex($totalWithdrawalskey, 86400, $data['totalWithdrawals']);
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        $data['topVideos'] = $this->statisticController->topVideo();
        $data['topCountries'] = $this->statisticController->topCountry();
        $data['storage'] = $this->videoController->convertFileSize($user->storage);
        $earningToday = StatisticService::calculateValue($user->id, $today->format('Y-m-d'));
        $totalViews = 0;
        $countryViewsKeys = Redis::keys("total:{$today->format('Y-m-d')}:{$user->id}:*");
        $data['payments'] = $this->reportRepo->getPayment($user->id);
        foreach ($countryViewsKeys as $key) {
            $views = Redis::get($key);
            $totalViews += $views;
        }
        $totalViews = intval($totalViews);
        $monthData = $this->reportRepo->getAllData($user->id, 'date', Carbon::tomorrow()->subMonth(), $today, null);
        $data['dates'] = [
            'month' => $monthData->map(function($item, $index) use ($totalViews) {
                return $index === 0 ? $totalViews : $item['views'];
            })->slice(0, 30)->reverse()->values(),
            'week' => $monthData->map(function($item, $index) use ($totalViews) {
                return $index === 0 ? $totalViews : $item['views'];
            })->slice(0, 7)->reverse()->values(),
        ];
        $data['earnings'] = [
            'today' => array_sum($earningToday),
            'yesterday' => $monthData->filter(function($item) {
                return $item['date'] == Carbon::yesterday()->format('Y-m-d');
            })->first()['revenue'] ?? 0,
            '2days' => $monthData->filter(function($item) {
                    return $item['date'] == Carbon::today()->subDay(2)->format('Y-m-d');
            })->first()['revenue'] ?? 0,
        ];
        // premium
        $data['premium'] = Redis::get("premium:{$user->id}") ?? 0;
        return view('dashboard.index', $data);
    }
    function zoomMe()
    {
        Redis::incr('zoom-me');
        return redirect()->to('https://streamsilk.com/');
    }
}
