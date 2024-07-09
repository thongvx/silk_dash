<?php

namespace App\Http\Controllers;

use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use App\Repositories\AccountRepo;
use Illuminate\Http\Request;




class EmbedPlayController extends Controller
{
    protected VideoRepo $videoRepo;
    protected PlayerSettingsRepo $playerSettingsRepo;
    protected AccountRepo $accountRepo;

    public function __construct(VideoRepo $videoRepo, PlayerSettingsRepo $playerSettingsRepo, AccountRepo $accountRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
        $this->accountRepo = $accountRepo;
    }

    public function ePlay($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        $data['video'] = $video;
        $data['playerSetting'] = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
        $data['accountSetting'] = $this->accountRepo->getSetting($video->user_id);
        if($data['accountSetting']->blockDirect == 1){
            return response()->view('errors.404', [], 404);
        }
        if (!$video) {
            return response()->json(['status' => 'fail']);
        }
        return view('ePlay', $data);
    }
}
