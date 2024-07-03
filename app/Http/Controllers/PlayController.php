<?php

namespace App\Http\Controllers;

use App\Enums\VideoCacheKeys;
use App\Jobs\CreateHlsJob;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Video;
use App\Models\AccountSetting;
use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class PlayController
{
    protected VideoRepo $videoRepo;
    protected AccountRepo $accountRepo;
    protected PlayerSettingsRepo $playerSettingsRepo;

    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
    }

    public function play($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        if ($video && $video->soft_delete == 0) {
            $video = $video->check_duplicate == 0 ? $this->videoRepo->findVideoBySlug($video->middle_slug) : $video;
            $data_setting = $this->accountRepo->getSetting($video->user_id);
            $player_setting = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
            $poster = $data_setting->gridPoster == 5 ? $video->grid_poster_5 : ($data_setting->gridPoster == 3 ? $video->grid_poster_3 : $video->poster);
            $poster = $poster == 0 ? 'https://cdnimg.streamsilk.com/image.jpeg' : $poster;
            if ($video->origin == 0) {
                $playData = [
                    'urlPlay' => 'https://' . EncoderTask::where('slug', $slug)->value('sv_upload') . '.encosilk.cc/storage/' . $slug . '.' . $video->format,
                    'videoID' => $video->slug,
                    'poster' => $poster,
                    'title' => $video->title,
                    'iframe' => $data_setting->blockDirect,
                    'videoType' => $data_setting->videoType,
                    'premium' => $data_setting->premiumMode,
                    'player_setting' => $player_setting,
                    'is_sub' => $video->is_sub,
                ];
                return view('playOrigin', $playData);
            } else {
                $video->pathStream = $video->pathStream == 0 ? $this->selectPathStream($video->sd, $video->hd, $video->fhd) : $video->pathStream;

                if ($video->stream == 0) {
                    $svStream = SvStreamService::selectSvStream();
                    Queue::push(new CreateHlsJob($video->middle_slug, $svStream, $video->pathStream, $video->sd, $video->hd, $video->fhd));
                    $video->stream =  $svStream;
                    $video->save();
                }else{
                    $svStream = SvStreamService::checkConnectSvStream(explode('-', $video->stream));
                    if ($svStream === null) {
                        $svStream = SvStreamService::selectSvStream();
                        $video->stream = $video->stream . '-' . $svStream;
                        $video->save();
                    }
                    Queue::push(new CreateHlsJob($video->middle_slug, $svStream, $video->pathStream, $video->sd, $video->hd, $video->fhd));
                }

                $playData = [
                    'urlPlay' => 'https://' . $svStream . '/data/' . explode('-', $video->pathStream)[1] . '/' . $video->middle_slug . '/master.m3u8',
                    'videoID' => $video->slug,
                    'poster' => $poster,
                    'title' => $video->title,
                    'iframe' => $data_setting->blockDirect,
                    'videoType' => $data_setting->videoType,
                    'premium' => $data_setting->premiumMode,
                    'player_setting' => $player_setting,
                    'is_sub' => $video->is_sub,
                ];

                return view('play', $playData);
            }
        } else {
            abort(404);
        }
    }

    function selectSvStream()
    {
        return SvStream::where('active', 1)->where('cpu', '<', 10)->where('percent_space', '<', 95)->where('out_speed', '<', 700)->value('name');
    }

    function checkConnectSvStream($arrStream)
    {
        return SvStream::whereIn('name', $arrStream)->where('out_speed', '<', 700)->where('active', 1)->orderBy('out_speed', 'asc')->value('name');
    }

    function selectPathStream($sd, $hd, $fhd)
    {
        return $sd != 0 ? $sd : ($hd != 0 ? $hd : $fhd);
    }
}
