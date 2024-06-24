<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepo;
use App\Repositories\VideoRepo;
use App\Repositories\ReportRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\Statistic\StatisticController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
class HomeController extends Controller
{
    protected $notificationRepo, $statisticController, $videoRepo, $reportRepo;

    public function __construct(NotificationRepo $notificationRepo, StatisticController $statisticController,
                                VideoRepo $videoRepo, ReportRepo $reportRepo)
    {
        $this->notificationRepo = $notificationRepo;
        $this->statisticController = $statisticController;
        $this->videoRepo = $videoRepo;
        $this->reportRepo = $reportRepo;
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $data['userWatching'] = Redis::get("total:{$user->id}") ?? 0;
        $data['totalFile'] = $this->videoRepo->where('user_id', $user->id)->where('soft_delete', 0)->count();
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        $data['topVideos'] = $this->statisticController->topVideo();
        $data['topCountries'] = $this->statisticController->topCountry();
        $earningToday = 0;
        $countryViewsKey = "user:{$user->id}:country_views";
        $countries = Redis::zrange($countryViewsKey, 0, -1);
        foreach ($countries as $country) {
            $views = Redis::zscore($countryViewsKey, $country);
            $earningToday += $views;
        }
        $Today = Carbon::today();
        $totalBalancekey = "user:{$user->id}:total_balance:{$Today}";
        $totalBalance = Redis::get($totalBalancekey);
        if(isset($totalBalance)){
            $data['totalBalance'] = $totalBalance;
        }else{
            $totalBalance = Db::table('payment')->where('user_id', $user->id)->sum('amount');
            Redis::setex($totalBalancekey, 86400, $totalBalance);
            $data['totalBalance'] = $totalBalance;
        }
        $data['dates'] = [
            'day' => $earningToday*0.4,
            'week' => $this->reportRepo->getAllData($user->id, 'date', Carbon::now()->subWeek(), $Today, null)->map(function($item) {
                return $item['views'];
            }),
            'month' => $this->reportRepo->getAllData($user->id, 'date', Carbon::now()->subMonth(), $Today, null)->map(function($item) {
                return $item['views'];
            }),
        ];
        $data['earnings'] = [
            'today' => $earningToday*0.4,
            'yesterday' => $this->reportRepo->getAllData($user->id, 'date', Carbon::yesterday(), Carbon::yesterday(), null)[0]['revenue'] ?? 0,
            '2days' => $this->reportRepo->getAllData($user->id, 'date', $Today->subDays(2), $Today->subDays(2), null)[0]['revenue'] ?? 0,
        ];
        return view('dashboard.index', $data);
    }
}
