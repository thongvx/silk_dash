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
        $keyAdsIp = "ads_ip:{$request->ip()}";
        $views = Redis::get($keyPerIp) ?: 0;
        $viewsAds = Redis::get($keyAdsIp) ?: 0;
        $today = Carbon::today()->format('Y-m-d');
        if ($views < 2 ) {

            $views++;
            $viewsAds++;
            Redis::setex($keyPerIp, 24 * 60 * 60, $views);
            Redis::setex($keyAdsIp, 20 * 60, $viewsAds);

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

}
