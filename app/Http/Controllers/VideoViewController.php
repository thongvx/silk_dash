<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VideoViewController
{
    protected VideoRepo $videoRepo;

    public function __construct(VideoRepo $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }
    public function updateView($slug, Request $request)
    {
        $origin = $request->headers->get('Origin') ?: $request->headers->get('Referer');

        $keyPerIp = "user_views:{$request->ip()}";

        $views = Redis::get($keyPerIp) ?: 0;


        //1 ngày 1 ip chỉ được tính 2 view thôi
        if ($views < 2 && $domainName == 'user.streamsilk.com') {

            $views++;
            Redis::setex($keyPerIp, 24 * 60 * 60, $views);

            //Lấy country truy cập hệ thống ở đây
            $country = $request->header('CF-IPCountry');

            //Tăng view cho video

            $video = $this->videoRepo->findVideoBySlug($slug);
            if (!$video){
                return response()->json(['status' => 'fail']);
            }
            $totalViewKey = "total:{$video->user_id}";
            $key = "video_views:{$video->id}:{$video->user_id}:{$country}";
            Redis::incr($key);
            Redis::incr($totalViewKey);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }

}
