<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\VideoCacheKeys;
use App\Repositories\VideoRepo;
use App\Models\SvTiktok;
use App\Models\AddTiktok;
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
            if($video->sd != '0' && $video->sd != '19')
                $this->addLinkUploadTiktok($slug, $video->sd, 480);
            if($video->hd != '0' && $video->hd != '19')
                $this->addLinkUploadTiktok($slug, $video->hd, 720);
            if($video->fhd != '0' && $video->fhd != '19')
                $this->addLinkUploadTiktok($slug, $video->fhd, 1080);
            return '200';
        }
        else{
            return '404';
        }
    }
    function addLinkUploadTiktok($slug, $path, $quality)
    {
        $arrPath = explode('-', $path);
        $url = 'http://'.$arrPath[0].'.stosilk.cc/data/'.$arrPath[1].'/'.$slug.'/'.$slug.$quality.'.mp4';
        $svTiktok = 't01';
        $apiSvTiktok = $this->getApiSvTiktok($svTiktok);

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
