<?php

namespace App\Http\Controllers;

use App\Jobs\CreateDownload;
use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class DownloadController extends Controller
{
    protected $videoRepo, $accountRepo, $playerSettingsRepo;
    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
    }
    public function download($slug)
    {
        $userId = auth()->id();
        $video = $this->videoRepo->findVideoBySlug($slug);
        $data['video'] = $video;
        $data['playerSetting'] = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
        $data['accountSetting'] = $this->accountRepo->getSetting($video->user_id);
        if($data['accountSetting']->disableDownload == 1 || $video->soft_delete == 1 || !$video){
            return response()->view('errors.404', [], 404);
        }
        return view('download', $data);
    }
    public function addDownloadVideo(Request $request)
    {
        $slug = $request->slug;
        $quality = $request->quality;
        $path = $request->path;

        Queue::push(new CreateDownload($slug, 'd01', $quality, $path));

        return 'success';
    }
    function creatTokenDownload(){
        $exp = time()+3600;

        $string_hash = $exp.' Silk@2024';
        $md5_hash = md5($string_hash, true);
        $base64_hash = base64_encode($md5_hash);
        $base64_hash = strtr($base64_hash, '+/', '-_');
        $base64_hash = rtrim($base64_hash, '=');

        return '?token='.$base64_hash.'&expires='.$exp;
    }
}
