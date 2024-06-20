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

        // Lấy ra top quốc gia trong ngày
        $topCountries = Redis::zrevrange("user:{$userId}:country_views", 0, 9, 'WITHSCORES');

        return response()->json($topCountries);
    }

    //Get top 10 daily videos
    public function topVideo()
    {
        $userId = auth()->id();
        $date = Carbon::today()->format('Y-m-d');

        // Lấy ra top 10 video được xem nhiều nhất trong ngày

        //Todo: Thêm cái cache vào!
        $topVideos = VideoView::where('video_views.user_id', $userId)
            ->where('video_views.date', $date)
            ->join('videos', 'video_views.video_id', '=', 'videos.id')
            ->orderBy('video_views.views', 'desc')
            ->take(10)
            ->get(['video_views.*', 'videos.title', 'videos.slug', 'videos.poster']);

        return response()->json($topVideos);

    }

}
