<?php

namespace App\Http\Controllers\Play;

use Illuminate\Support\Facades\Redis;

class VideoViewController
{
    public function updateView($videoId)
    {
        $sessionKey = 'video_viewed_' . $videoId;

        // Tạo một key duy nhất cho mỗi video
        $key = "video_views:{$videoId}";

        // Tăng số lượt xem trong Redis
        if (!session()->has($sessionKey)) {
            Redis::incr($key);
            session([$sessionKey => 1]);
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false]);
        }
    }

}
