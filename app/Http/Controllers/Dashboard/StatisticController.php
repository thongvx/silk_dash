<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\VideoView;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class StatisticController
{

    public function topCountry(){
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
        $topVideos = VideoView::where('user_id', $userId)
            ->where('date', $date)
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        return response()->json($topVideos);

    }

}
