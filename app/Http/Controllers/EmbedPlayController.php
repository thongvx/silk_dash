<?php

namespace App\Http\Controllers;

use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;

class EmbedPlayController extends Controller
{
    protected VideoRepo $videoRepo;
    protected PlayerSettingsRepo $playerSettingsRepo;

    public function __construct(VideoRepo $videoRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
    }

    public function ePlay($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        $data['video'] = $video;
        $data['playerSetting'] = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
        if (!$video) {
            return response()->json(['status' => 'fail']);
        }
        return view('ePlay', $data);
    }
}
