<?php

namespace App\Http\Controllers\Play;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VideoViewController
{
    public function updateView($slug, Request $request)
    {
        $keyPerIp = "user_views:{$request->ip()}";
        $views = Redis::get($keyPerIp) ?: 0;

        //1 ngày 1 ip chỉ được tính 2 view thôi
        if ($views < 2) {
            $views++;
            Redis::setex($keyPerIp, 24 * 60 * 60, $views);

            //Lấy country truy cập hệ thống ở đây
            $country = $request->header('CF-IPCountry');

            //Tăng view cho video
            $key = "video_views:{$slug}:{$country}";
            Redis::incr($key);
        }
    }

}
