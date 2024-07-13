<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
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
}
