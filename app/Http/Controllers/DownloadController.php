<?php

namespace App\Http\Controllers;

use App\Jobs\CreateDownload;
use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use App\Services\ServerDownload\SvDownloadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;

class DownloadController extends Controller
{
    protected $videoRepo, $accountRepo, $playerSettingsRepo;
    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
    }
    public function download($slug, Request $request)
    {
//        $recaptchaResponse = $request->input('g-recaptcha-response');
//        if (!$recaptchaResponse) {
//            return view('captcha', ['slug' => $slug]);
//        }
//
//        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
//            'secret' => config('services.recaptcha.secret_key'),
//            'response' => $recaptchaResponse,
//        ]);
//
//        $body = json_decode($response->body());
//
//        if (!$body->success) {
//            return view('captcha', ['slug' => $slug]);
//        }
        $userId = auth()->id();
        $video = $this->videoRepo->findVideoBySlug($slug);
        if ($video && $video->soft_delete == 0){
            $video = $video->check_duplicate == 0 ? $this->videoRepo->findVideoBySlug($video->middle_slug) : $video;
            //check ip
            $keyAdsIp = "ads_ip:{$request->ip()}";
            $viewsAds = Redis::get($keyAdsIp) ?: 0;
            $viewsAds++;
            if (Redis::exists($keyAdsIp)) {
                Redis::set($keyAdsIp, $viewsAds, 'XX');
            } else {
                Redis::setex($keyAdsIp, 6 * 60 * 60, $viewsAds);
            }
            $data['viewsAds'] = $viewsAds;
            $data['video'] = $video;
            $data['playerSetting'] = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
            $data['accountSetting'] = $this->accountRepo->getSetting($video->user_id);
            $data['svDownload'] = SvDownloadService::selectSvDownload();
            if($data['accountSetting']->disableDownload == 1){
                return response()->view('errors.404', [], 404);
            }
            $cacheKey = 'download_link_' . $slug;
            Redis::setex($cacheKey, 600, json_encode($data));
            return redirect()->route('download', ['slug' => $slug]);
        }
        else{
            return response()->view('errors.404', [], 404);
        }
    }
    public function showDownloadPage($slug)
    {
        $cacheKey = 'download_link_' . $slug;
        if (!Redis::exists($cacheKey)) {
            return $this->download($slug, request());
        }

        $data = json_decode(Redis::get($cacheKey), true);
        return view('download', $data);
    }
    public function addDownloadVideo(Request $request)
    {
        $slug = $request->slug;
        $quality = $request->quality;
        $path = $request->path;
        $sv = $request->sv;
        Queue::push(new CreateDownload($slug, $sv, $quality, $path));
        $tokenDownload = $this->creatTokenDownload();
        return $tokenDownload;
    }

    function creatTokenDownload(){
        $exp = time()+3600;

        $string_hash = $exp.' Silk@2024';
        $md5_hash = md5($string_hash, true);
        $base64_hash = base64_encode($md5_hash);
        $base64_hash = strtr($base64_hash, '+/', '-_');
        $base64_hash = rtrim($base64_hash, '=');

        return '&token='.$base64_hash.'&expires='.$exp;
    }
}
