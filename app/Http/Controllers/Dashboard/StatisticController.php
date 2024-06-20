<?php

namespace App\Http\Controllers\Dashboard;

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

        $totalViews = array_sum($topCountries);
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
        redis::setex($keyTopVideos, 5184000, serialize($topVideos));
        return $topVideos;
    }

    public function viewDate()
    {
        $userId = auth()->id();
        $now = Carbon::now();
        $data = [];

        for ($i = 0; $i <= 30; $i++) {
            $date = $now->copy()->subDays($i)->format('Y-m-d');
            $keyViewDate = "user:{$userId}:view_date:{$date}";
            $viewDate = Redis::get($keyViewDate);

            if (!isset($viewDate)) {
                $viewDate = VideoView::where('video_views.user_id', $userId)
                    ->where('video_views.date', $date)
                    ->sum('video_views.views');
                Redis::setex($keyViewDate, 2764800, serialize($viewDate));
            } else {
                $viewDate = unserialize($viewDate);
            }

            $data[$date] = $viewDate;
        }

        return $data;
    }
}
