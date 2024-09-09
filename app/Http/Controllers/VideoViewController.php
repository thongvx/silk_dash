<?php

namespace App\Http\Controllers;

use App\Repositories\VideoRepo;
use App\Repositories\AccountRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class VideoViewController
{
    protected $videoRepo, $accountRepo;

    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
    }
    public function updateView($slug, Request $request)
    {
        $origin = $request->headers->get('Origin');
        $referer = $request->headers->get('Referer');
        $keyPerIp = "user_views:{$request->ip()}";
        $views = Redis::get($keyPerIp) ?: 0;

        $token = $request->get('token');
        $expires = $request->get('expires');

        $today = Carbon::today()->format('Y-m-d');
        if ($views < 2 && $this->isValidToken($token, $expires)) {

            $views++;
            Redis::setex($keyPerIp, 24 * 60 * 60, $views);

            $country = $request->header('CF-IPCountry');

            $video = $this->videoRepo->findVideoBySlug($slug);
            if (!$video){
                return response()->json(['status' => 'fail']);
            }
            $totalCountryKey = "total_country_views:{$today}";
            $userKey = "total_user_views:{$today}:{$video->user_id}";
            $watchingUserKey ="watching_users:{$video->user_id}";
            $totalViewKey = "total:{$today}:{$video->user_id}:{$country}";
            $keyWithCountry = "country_video_views:{$video->id}:{$video->user_id}:{$country}";
            $key = "video_views:{$video->id}:{$video->user_id}";
            $data_setting = $this->accountRepo->getSetting($video->user_id);
            if ($data_setting->earningModes == 1){
                $totalImpression1 = "total_impression1:{$today}:{$video->user_id}:{$country}";
                Redis::incr($totalImpression1);
            }
            if ($data_setting->earningModes == 2){
                $totalImpression2 = "total_impression2:{$today}:{$video->user_id}:{$country}";
                Redis::incr($totalImpression2);
            }

            //view premium
            if(Redis::exists("premium:{$video->user_id}")){
                $newValue = Redis::decr("premium:{$video->user_id}");
                if ($newValue <= 0)
                    Redis::del("premium:{$video->user_id}");
            }

            Redis::incr($key);
            Redis::incr($keyWithCountry);
            Redis::incr($totalViewKey);
            Redis::incr($watchingUserKey);
            Redis::incr($userKey);
            Redis::zincrby($totalCountryKey, 1, $country);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }
    function isValidToken($token, $expires)
    {
        if (time() > $expires || time()+60 < $expires) {
            return false;
        }

        $string_hash = $expires . '_view_Silk@2024';
        $md5_hash = md5($string_hash, true);
        $base64_hash = base64_encode($md5_hash);
        $base64_hash = strtr($base64_hash, '+/', '-_');
        $base64_hash = rtrim($base64_hash, '=');

        if ($token === $base64_hash) {
            return true;
        }

        return false;
    }
}
