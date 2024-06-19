<?php

namespace App\Http\Controllers;

use App\Enums\VideoCacheKeys;
use App\Jobs\CreateHlsJob;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Video;
use App\Models\AccountSetting;
use App\Repositories\AccountRepo;
use App\Repositories\VideoRepo;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class PlayController
{
    protected VideoRepo $videoRepo;
    protected AccountRepo $accountRepo;

    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
    }

    public function play($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);

        if ($video && $video->soft_delete == 0) {
            $video = $video->check_duplicate == 0 ? $this->videoRepo->findVideoBySlug($video->middle_slug) : $video;
            $data_setting = $this->accountRepo->getSetting($video->user_id);
            $poster = $data_setting->gridPoster == 5 ? $video->grid_poster_5 : ($data_setting->gridPoster == 3 ? $video->grid_poster_3 : $video->poster);
            $poster = $poster == 0 ? 'https://cdnimg.streamsilk.com/image.jpeg' : $poster;
            if ($video->origin == 0) {
                $playData = [
                    'urlPlay' => 'https://' . EncoderTask::where('slug', $slug)->where('quality', 480)->value('sv_upload') . '.streamsilk.com/storage/' . $slug . '.' . $video->format,
                    'poster' => $poster,
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
                    'urlPlay' => 'https://' . $svStream . '.streamsilk.com/data/' . explode('-', $video->pathStream)[1] . '/' . $video->middle_slug . '/master.m3u8',
                    'poster' => $poster,
                    'title' => $video->title,
                    'logo' => $data_setting->logo,
                    'logo_link' => $data_setting->logoLink,
                    'position' => $data_setting->position,
                    'show_title' => $data_setting->showTitle,
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
