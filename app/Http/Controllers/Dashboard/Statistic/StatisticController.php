<?php

namespace App\Http\Controllers\Dashboard\Statistic;

use App\Models\VideoView;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class StatisticController
{

    public function topCountry()
    {
        $userId = auth()->id();

        // Lấy ra top 10 quốc gia trong ngày
        $topCountries = Redis::zrevrange("user:{$userId}:country_views", 0, 9, 'WITHSCORES');

        $totalViews = Redis::zscore("user:{$userId}:country_views", 'total');
        if ($totalViews <= 0) {
            return [];
        }

        foreach ($topCountries as $country => $views) {
            $topCountries[$country] = [
                'views' => $views,
                'percentage' => ($views / $totalViews) * 100,
            ];
        }
        return $topCountries;

    }

    //Get top 10 daily videos
    public function topVideo()
    {
        $userId = auth()->id();
        $date = Carbon::today()->format('Y-m-d');
        // Lấy ra top 10 video được xem nhiều nhất trong ngày
        $keyTopVideos = "user:{$userId}:top_videos:{$date}";
        $Video = Redis::get($keyTopVideos);
        if (isset($Video)){
            return unserialize($Video);
        }
        $topVideos = VideoView::where('video_views.user_id', $userId)
            ->where('video_views.date', $date)
            ->join('videos', 'video_views.video_id', '=', 'videos.id')
            ->orderBy('video_views.views', 'desc')
            ->take(10)
            ->get(['video_views.*', 'videos.title', 'videos.slug', 'videos.poster']);
        redis::setex($keyTopVideos, 86400, serialize($topVideos));
        return $topVideos;
    }
    //get date views
    public function viewDate()
    {
        $userId = auth()->id();
        $views = [
            'today',
            '7days',
            '30days',
        ];
        // Get today's views
        $date = Carbon::today()->format('Y-m-d');
        $views['today'] = Redis::get("user:{$userId}:date_views:{$date}") ?? 0;

        // Get views for the past 7 days
        $views['7days'] = collect(range(0, 6))->mapWithKeys(function ($day) use ($userId) {
            $date = Carbon::today()->subDays($day)->format('Y-m-d');
            return [$date => Redis::get("user:{$userId}:date_views:{$date}") ?? 0];
        });

        // Get views for the past 30 days
        $views['30days'] = collect(range(0, 29))->mapWithKeys(function ($day) use ($userId) {
            $date = Carbon::today()->subDays($day)->format('Y-m-d');
            return [$date => Redis::get("user:{$userId}:date_views:{$date}") ?? 0];
        });
        return $views;
    }
}
