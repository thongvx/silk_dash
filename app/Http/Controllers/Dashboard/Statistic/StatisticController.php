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
        $date = Carbon::today()->format('Y-m-d');
        // Lấy ra top 10 quốc gia trong ngày
        $topCountries = Redis::zrevrange("user:{$userId}:country_views{$date}", 0, 9, 'WITHSCORES');
        $totalViews = 0;
        $countryViewsKey = "user:{$userId}:country_views{$date}";
        $countries = Redis::zrange($countryViewsKey, 0, -1);
        foreach ($countries as $country) {
            $views = Redis::zscore($countryViewsKey, $country);
            $totalViews += $views;
        }
        if ($totalViews <= 0) {
            return [];
        }

        $totalViews = intval($totalViews);

        $result = [];

        foreach ($topCountries as $country => $views) {
            $views = intval($views);
            $result[] = [
                'country' => $country,
                'views' => $views,
                'percentage' => round(($views / $totalViews) * 100, 2),
            ];
        }
        return $result;

    }

    //Get top 10 daily videos
    public function topVideo()
    {
        $userId = auth()->id();
        $date = Carbon::today()->format('Y-m-d');
        // Lấy ra top 10 video được xem nhiều nhất trong ngày
        $keyTopVideos = "user:{$userId}:top_videos:{$date}";
        $topVideos = Redis::get($keyTopVideos);
        if (isset($topVideos)){
            return unserialize($topVideos);
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
}
