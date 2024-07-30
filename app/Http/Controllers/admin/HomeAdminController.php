<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\VideoView;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\Dashboard\VideoController;
use Carbon\Carbon;
use App\Models\User;
use App\Repositories\AccountRepo;
use App\Repositories\ReportRepo;
use App\Models\CountryTier;
use App\Services\StatisticService;
use App\Models\File;

class HomeAdminController extends Controller
{
    protected $videoController, $accountRepo, $reportRepo;

    public function __construct(VideoController $videoController, AccountRepo $accountRepo, ReportRepo $reportRepo)
    {
        $this->videoController = $videoController;
        $this->accountRepo = $accountRepo;
        $this->reportRepo = $reportRepo;
    }

    //get data for chart
    private function getDataChart($today){
        $dates = collect(range(30, 0))->map(function($item) use ($today) {
            return Carbon::tomorrow()->subDays($item)->format('Y-m-d');
        });
        $cacheKey = "viewsData:{$today}";
        $viewsData = unserialize(Redis::get($cacheKey));
        if (!$viewsData) {
            $viewsData = $this->reportRepo
                ->whereIn('date', $dates)
                ->selectRaw('date, sum(views) as views')
                ->groupBy('date')
                ->get();
            Redis::setex($cacheKey, 43200, serialize($viewsData));
        }

        $totalViewsDay = 0;
        $totalViewsKey = Redis::keys("total_user_views:{$today}:*");
        foreach ($totalViewsKey as $key) {
           $totalViewsDay += Redis::get($key) ?? 0;
        }
        // Process views data for month and week
        $allDatesWithDefaults = $dates->mapWithKeys(function($date) {
            return [$date => 0];
        });

        // Update with actual views data where available
        $processedViewsData = $allDatesWithDefaults->merge($viewsData->mapWithKeys(function($item) {
            return [$item->date => $item->views];
        }));
        $processedViewsData->put($today, $totalViewsDay);

        $data['dates'] = [
            'month' => $processedViewsData->values(),
            'week' => $processedViewsData->slice(23, 30)->values(),
        ];

        return $data;
    }

    //get top users
    private function getTopUsers($today){
        $allKeys = Redis::keys("total_user_views:{$today}:*");
        $scores = [];

        foreach ($allKeys as $key) {
            $userId = explode(':', $key)[2];
            $scores[str_replace("total_user_views:{$today}:", '', $key)] = [
                'views' => Redis::get($key) ?? 0,
                'name' => User::find($userId)->name,
                'id' => $userId,
            ];
        }
        arsort($scores);
        $topUsers = array_slice($scores, 0, 10, true);

        return $topUsers;
    }

    //get top videos
    private function getTopVideos($today){
        $allVideos = VideoView::where('date', $today)
            ->join('videos', 'video_views.video_id', '=', 'videos.id')
            ->orderBy('video_views.views', 'desc')
            ->take(10)
            ->get(['videos.title', 'video_views.views', 'videos.slug']);
        return $allVideos;
    }
    //top Country
    private function topCountry($today){
        $topCountries = Redis::zrevrange("total_country_views:{$today}", 0, 9);
        $totalViews = 0;
        $totalViewsKey = Redis::keys("total_user_views:{$today}:*");
        foreach ($totalViewsKey as $key) {
            $totalViews += Redis::get($key) ?? 0;
        }
        if ($totalViews <= 0) {
            return [];
        }

        $totalViews = intval($totalViews);

        $result = [];
        $AllCountries = Redis::get('allCountries') ;
        if (isset($AllCountries)){
            $AllCountries = unserialize($AllCountries);
        }else{
            $AllCountries = CountryTier::all();
            Redis::set('allCountries', serialize(CountryTier::all()));
        }
        foreach ($topCountries as $country => $views) {
            $views = intval($views);
            $result[] = [
                'country' => $AllCountries->where('code', $country)->first()->name ?? $country,
                'views' => $views,
                'percentage' => round(($views / $totalViews) * 100, 2),
            ];
        }
        return $result;

    }

    //index
    public function index(){
        $today = Carbon::today()->format('Y-m-d');
        $users = Redis::get('all_users') ? unserialize(Redis::get('all_users')) : User::all();
        $totalWatching = 0;
        $watchingKeys = redis::keys("watching_users:*");
        foreach ($watchingKeys as $key) {
            $value = redis::get($key);
            $totalWatching += $value;
        }
        $statisticService = new StatisticService($this->accountRepo);
        $totalEarnings = $statisticService->calculateTotalEarnings($today);

        $data_chart = $this->getDataChart($today);

        $topUsers = $this->getTopUsers($today);
        $topVideos = $this->getTopVideos($today);
        $cacheKey = "total_balance:{$today}";
        $totalBalance = Redis::get($cacheKey);

        if (!$totalBalance) {
            $totalBalance = $this->reportRepo->sum('revenue') - Payment::sum('amount');
            Redis::setex($cacheKey, 43200, $totalBalance); // Cache for 12 hours
        } else {
            $totalBalance = floatval($totalBalance);
        }
        $data =[
            'title' => 'Dashboard',
            'userWatching' => $totalWatching,
            'storage' => File::formatSizeUnits($users->sum('storage')),
            'users' => $users->count(),
            'todayEarning' => $totalEarnings,
            'totalBalance' => $totalBalance,
            'dates' => $data_chart['dates'],
            'topUsers' => $topUsers,
            'topVideos' => $topVideos,
            'topCountries' => $this->topCountry($today),
        ];

        return view('admin.index', $data);
    }


}
