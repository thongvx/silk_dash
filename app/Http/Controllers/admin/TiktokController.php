<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\CreatUploadTiktokJob;
use Illuminate\Http\Request;
use App\Enums\VideoCacheKeys;
use App\Repositories\VideoRepo;
use App\Models\SvTiktok;
use App\Models\AddTiktok;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class TiktokController extends Controller
{
    protected $videoRepo;
    public function __construct(VideoRepo $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }
    function addVideoTiktok($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        if($video){
            $dataVideo['status'] = 0;
            $dataVideo['slug'] = $slug;
            if($video->sd != '0' && $video->sd != '19') {
                $svTiktok = 't01';
                $this->addLinkUploadTiktok($slug, $video->sd, 480, $svTiktok);
                $dataVideo['quality'] = 480;
                $dataVideo['path'] = $video->sd;
                $dataVideo['sv'] = $svTiktok;
                AddTiktok::create($dataVideo);
            }

            if($video->hd != '0' && $video->hd != '19'){
                $svTiktok = 't01';
                $this->addLinkUploadTiktok($slug, $video->hd, 720, $svTiktok);
                $dataVideo['quality'] = 720;
                $dataVideo['path'] = $video->hd;
                $dataVideo['sv'] = $svTiktok;
                AddTiktok::create($dataVideo);
            }

            if($video->fhd != '0' && $video->fhd != '19'){
                $svTiktok = 't01';
                $this->addLinkUploadTiktok($slug, $video->fhd, 1080, $svTiktok);
                $dataVideo['quality'] = 1080;
                $dataVideo['path'] = $video->fhd;
                $dataVideo['sv'] = $svTiktok;
                AddTiktok::create($dataVideo);
            }

            return '200';
        }
        else{
            return '404';
        }
    }
    function addLinkUploadTiktok($slug, $path, $quality, $svTiktok)
    {
        $arrPath = explode('-', $path);
        $url = 'http://'.$arrPath[0].'.stosilk.cc/data/'.$arrPath[1].'/'.$slug.'/'.$slug.$quality.'.mp4';
        $apiSvTiktok = $this->getApiSvTiktok($svTiktok);
        Queue::push(new CreatUploadTiktokJob($svTiktok, $apiSvTiktok, $url));
    }
    function getApiSvTiktok($sv)
    {
        $apiSvTiktok = Redis::get(VideoCacheKeys::API_SV_TIKTOK->value.$sv);
        if(!$apiSvTiktok){
            $key_tiktok = SvTiktok::where('name', $sv)->value('key_api');
            Redis::set(VideoCacheKeys::API_SV_TIKTOK->value.$sv, $key_tiktok);
        }
        return $apiSvTiktok;
    }
}
