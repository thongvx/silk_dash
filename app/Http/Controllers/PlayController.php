<?php

namespace App\Http\Controllers;

use App\Enums\VideoCacheKeys;
use App\Jobs\CreateHlsJob;
use App\Jobs\CreatStreamAudioJob;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Video;
use App\Models\AccountSetting;
use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\VideoRepo;
use App\Repositories\CustomAdsRepo;
use App\Repositories\AudioVideoRepo;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class PlayController
{
    protected $videoRepo;
    protected $accountRepo;
    protected $playerSettingsRepo;
    protected $customAdsRepo;
    protected $AudioVideoRepo;

    public function __construct(VideoRepo $videoRepo, AccountRepo $accountRepo,
                                PlayerSettingsRepo $playerSettingsRepo, CustomAdsRepo $customAdsRepo, AudioVideoRepo $AudioVideoRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
        $this->customAdsRepo = $customAdsRepo;
        $this->AudioVideoRepo = $AudioVideoRepo;
    }

    public function play($slug, Request $request)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        $refererDomain = $request->headers->get('referer');
        $parsedUrl = parse_url($refererDomain);
        $domain = $parsedUrl['host'] ?? 'embed';
        if ($video && $video->soft_delete == 0) {
            $data_setting = $this->accountRepo->getSetting($video->user_id);
            $player_setting = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
            $is_sub = $video->is_sub;
            $title = $video->title;
            $slug_sub = $video->slug;
            if($data_setting->earningModes == 0)
                $custom_ads = $this->customAdsRepo->getCustomAds($video->user_id);
            else
                $custom_ads = 0;
            if($domain == 'streamsilk.com' || strpos('domain-'.$data_setting->domain, $domain) != 0) {
                $video = $video->check_duplicate == 0 ? $this->videoRepo->findVideoBySlug($video->middle_slug) : $video;
                $poster = $player_setting->thumbnail_grid == 5 ? $video->grid_poster_5 : ($player_setting->thumbnail_grid == 3 ? $video->grid_poster_3 : $video->poster);
                $poster = $poster == 0 ? 'https://cdnimg.streamsilk.com/image.jpeg' : $poster;
                if ($video->origin == 0) {
                    $playData = [
                        'urlPlay' => 'https://' . EncoderTask::where('slug', $slug)->value('sv_upload') . '.encosilk.cc/storage/' . $slug . '.' . $video->format,
                        'videoID' => $video->slug,
                        'poster' => $poster,
                        'title' => $title,
                        'iframe' => $data_setting->blockDirect,
                        'videoType' => $data_setting->videoType,
                        'premium' => $data_setting->premiumMode,
                        'player_setting' => $player_setting,
                        'is_sub' => $is_sub,
                        'slug_sub' => $slug_sub,
                        'custom_ads' => $custom_ads,
                    ];
                    return view('playOrigin', $playData);
                } else {
                    $video->pathStream = $video->pathStream == 0 ? $this->selectPathStream($video->sd, $video->hd, $video->fhd) : $video->pathStream;
                    $urlStream = 0;
                    if(!file_exists('data/'.$video->middle_slug)) {
                        if ($video->stream == 0) {
                            $svStream = SvStreamService::selectSvStream();
//                            Queue::push(new CreateHlsJob($video->middle_slug, $svStream, $video->pathStream, $video->sd, $video->hd, $video->fhd));
                            //$this->callSvStream($svStream, $video->middle_slug, $video->pathStream, $video->sd, $video->hd, $video->fhd);
                            $urlStream = 'https://'.$svStream.'/insertData?slug='.$video->middle_slug.'&path='.$video->pathStream.'&sto480='.$video->sd.'&sto720='.$video->hd.'&sto1080='.$video->fhd;
                            $nameSvStream = explode('.', $svStream);
                            $video->stream = $nameSvStream[0];
                            $video->save();
                        } else {
                            $svStream = SvStreamService::checkConnectSvStream(explode('-', $video->stream));
                            if ($svStream === null) {
                                $svStream = SvStreamService::selectSvStream();
                                $nameSvStream = explode('.', $svStream);
                                $video->stream = $video->stream . '-' . $nameSvStream[0];
                                $video->save();
                            }
//                            Queue::push(new CreateHlsJob($video->middle_slug, $svStream, $video->pathStream, $video->sd, $video->hd, $video->fhd));
                            //$this->callSvStream($svStream, $video->middle_slug, $video->pathStream, $video->sd, $video->hd, $video->fhd);
                            $urlStream = 'https://'.$svStream.'/insertData?slug='.$video->middle_slug.'&path='.$video->pathStream.'&sto480='.$video->sd.'&sto720='.$video->hd.'&sto1080='.$video->fhd;
                            if($video->audio == 1){
                                $audioFile = $this->AudioVideoRepo->getAudioVideo($video->slug);
                                foreach ($audioFile as $audio){
                                    Queue::push(new CreatStreamAudioJob($audio['slug'], $svStream, $audio['language'], $audio['path']));
                                }
                            }
                        }
                        $urlPlay = 'https://' . $svStream . '/data/' . explode('-', $video->pathStream)[1] . '/' . $video->middle_slug . '/master.m3u8';
                    }
                    else
                        $urlPlay = 'https://streamsilk.com/data/'.$video->middle_slug.'/'.$video->middle_slug.'.m3u8';

                    $playData = [
                        'urlPlay' => $urlPlay,
                        'videoID' => $video->slug,
                        'poster' => $poster,
                        'title' => $title,
                        'iframe' => $data_setting->blockDirect,
                        'videoType' => $data_setting->videoType,
                        'premium' => $data_setting->premiumMode,
                        'player_setting' => $player_setting,
                        'is_sub' => $is_sub,
                        'slug_sub' => $slug_sub,
                        'custom_ads' => $custom_ads,
                        'urlStream' => $urlStream,
                    ];
                    switch ($data_setting->earningModes) {
                        case 1:
                            $pagePlay = 'play1';
                            break;
                        case 2:
                            $pagePlay = 'play2';
                            break;
                        default:
                            $pagePlay = 'play';
                            break;
                    }
                    return view($pagePlay, $playData);
                }
            }
            else{
                return response()->view('errors.404', [], 404);
            }
        } else {
            return response()->view('errors.404', [], 404);
        }
    }
    function callSvStream($sv, $slug, $path, $sto480, $sto720, $sto1080)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.$sv.'/insertData?slug='.$slug.'&path='.$path.'&sto480='.$sto480.'&sto720='.$sto720.'&sto1080='.$sto1080,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6InlzTTRnTFdCZitPYk9TSFAzK2llQXc9PSIsInZhbHVlIjoiRXRsTmRnU2tVbGg3cVBXQktCMXdOM2I0RWg2b0FmcThtVllKVW15c2x6QWNkd21wWk92NG9YV2RSMXhDRlo4U01uN2FvQXQzMmtTUmxwRDduU3ZzY2pKVGNmTWgvUVZoNFFGVlpHbWJqT29xZXMzMUtYOVpwK0xBWmZpeWNjOG8iLCJtYWMiOiJhYmYzNjI2YzJmMzk4ZjMzOWE2MWE2ZTU0NGRiMWNkZDdkMDZjMThiZWI4NTQ1MTUzOTJmMTY5NzE3YjAwYmQzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IitJUm42UHZ6QVNaNHp0Zk1DUjhHZHc9PSIsInZhbHVlIjoiZlVpTk9JWTZTVTJUWVN0S1VlUnRNMnpMRTJ6bjN6QnZHTVBCNk1RTVZSdklLUTh0YjdIWm45bWVLalRSeDdKOFE2MmY5UzIwb0tzZUlMeHNOQkhTUDlLK3hkUXMwMndiRHJ2aktMejYvTEJHVTZUVlF0WHMxallIREdBWGpHdjkiLCJtYWMiOiIwMDQ4NjNhZGVkNWQ4MDlmNjNiYjFlNjgyM2I1MTBmYTRkNTVkNDY4Zjc1OTg1N2ZiNzhjNGVkNjMwZTE4MzU5IiwidGFnIjoiIn0%3D'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
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
    function directPage($slug){
        $video = $this->videoRepo->findVideoBySlug($slug);
        $data['video'] = $video;
        $data['playerSetting'] = $this->playerSettingsRepo->getAllPlayerSettings($video->user_id);
        $data['accountSetting'] = $this->accountRepo->getSetting($video->user_id);
        if($data['accountSetting']->blockDirect == 1 || $video->soft_delete == 1 || !$video){
            return response()->view('errors.404', [], 404);
        }
        return view('directPlay', $data);
    }
    function testplay(Request $request)
    {
        $refererDomain = $request->headers->get('referer');
        $parsedUrl = parse_url($refererDomain);
        $domain = $parsedUrl['host'] ?? 'embed';
        $data_setting = $this->accountRepo->getSetting(12);
        if($domain == 'streamsilk.com' || strpos('domain-'.$data_setting->domain, $domain) != 0){
            echo 'ok';
        }
        else{
            echo 'no';
        }
        echo $domain . ' - ' . $data_setting->domain;
    }
}
