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
            $svTiktok = SvTiktok::where('active', 1)->inRandomOrder()->first();
            if($video->sd != '0' && $video->sd != '19') {
                $dataVideo['quality'] = 480;
                $dataVideo['path'] = $video->sd;
                $dataVideo['sv'] = $svTiktok->name;
                $check = AddTiktok::where('slug', $slug)->where('quality', 480)->first();
                if(!$check) {
                    AddTiktok::create($dataVideo);
                    $this->addLinkUploadTiktok($slug, $video->sd, 480, $svTiktok->name);
                }
            }

            if($video->hd != '0' && $video->hd != '19'){
                $dataVideo['quality'] = 720;
                $dataVideo['path'] = $video->hd;
                $dataVideo['sv'] = $svTiktok->name;
                $check = AddTiktok::where('slug', $slug)->where('quality', 720)->first();
                if(!$check) {
                    AddTiktok::create($dataVideo);
                    $this->addLinkUploadTiktok($slug, $video->hd, 720, $svTiktok->name);
                }
            }

            if($video->fhd != '0' && $video->fhd != '19'){
                $dataVideo['quality'] = 1080;
                $dataVideo['path'] = $video->fhd;
                $dataVideo['sv'] = $svTiktok->name;
                $check = AddTiktok::where('slug', $slug)->where('quality', 1080)->first();
                if(!$check) {
                    AddTiktok::create($dataVideo);
                    $this->addLinkUploadTiktok($slug, $video->fhd, 1080, $svTiktok->name);
                }
            }

            return '200';
        }
        else{
            return '404';
        }
    }
    public function addLinkUploadTiktok($slug, $path, $quality, $svTiktok)
    {
        $arrPath = explode('-', $path);
        $url = 'http://'.$arrPath[0].'.stosilk.cc/data/'.$arrPath[1].'/'.$slug.'/'.$slug.$quality.'.mp4';
        $apiSvTiktok = $this->getApiSvTiktok($svTiktok);
        //Queue::push(new CreatUploadTiktokJob($svTiktok, $apiSvTiktok, $url));
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.$svTiktok.'.streamsilk.com/api/file?remoteUrl='.$url.'&key='.$apiSvTiktok,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',

        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $dataVideo['status'] = 0;
        $dataVideo['slug'] = $slug;
        $dataVideo['quality'] = $quality;
        $dataVideo['path'] = $path;
        $dataVideo['sv'] = $svTiktok;
        $check = AddTiktok::where('slug', $slug)->where('quality', $quality)->first();
        if(!$check) {
            AddTiktok::create($dataVideo);
        }
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
    function updateVideoTiktok()
    {
        $video = AddTiktok::where('status', 0)->orderBy('updated_at', 'asc')->first();
        if($video){
            $keyApi = $this->getApiSvTiktok($video->sv);
            $tmp = 'https://'.$video->sv.'.streamsilk.com/api/file?title='.$video->slug.$video->quality.'.mp4&key='.$keyApi;
            $check = file_get_contents($tmp);
            $check = json_decode($check, true);
            if($check['file']['status'] == 'complete'){
                $video->increment('status');
                $linkembed = $check['file']['embed'];
                $arrEmbed = explode('/', $linkembed);
                $idEmbed = $arrEmbed[count($arrEmbed) - 1];
                $urlHls = 'https://'.$video->sv.'.streamsilk.com/file/' . $idEmbed . '/master.html';
                //creat folder
                $tmp = 'data/'.$video->slug;
                if(!file_exists($tmp))
                    mkdir($tmp);
                //copy m3u8 master
                $tmp = 'data/'.$video->slug.'/'.$video->slug.'.m3u8';
                if(!file_exists($tmp))
                    copy('DataHLS/master.m3u8', 'data/'.$video->slug.'/'. $video->slug.'.m3u8');
                //copy video quality
                $tmp1 = 'data/'.$video->slug.'/'.$video->slug.$video->quality.'.m3u8';
                copy($urlHls, $tmp1);

                $dataHls = file_get_contents('DataHLS/'.$video->quality.'.m3u8');
                $dataHls = str_replace('master'.$video->quality.'.m3u8', $video->slug.$video->quality.'.m3u8', $dataHls);

                $dataHlsMaster = file_get_contents('data/'.$video->slug.'/'.$video->slug.'.m3u8');
                $dataHlsMaster = $dataHlsMaster.$dataHls;
                file_put_contents('data/'.$video->slug.'/'.$video->slug.'.m3u8', $dataHlsMaster);
                $video->increment('status');
            }
            else{
                $video->save();
            }
        }
    }
    function copyVideoTiktok(Request $request)
    {
        $slug = $request->slug;
        $quality = $request->quality;
        $urlHls = $request->urlHls;
        $urlHls = base64_decode($urlHls);
        //creat folder
        $tmp = 'data/'.$slug;
        if(!file_exists($tmp))
            mkdir($tmp);
        //copy m3u8 master
        $tmp = 'data/'.$slug.'/'.$slug.'.m3u8';
        if(!file_exists($tmp))
            copy('DataHLS/master.m3u8', 'data/'.$slug.'/'. $slug.'.m3u8');
        //copy video quality
        $tmp1 = 'data/'.$slug.'/'.$slug.$quality.'.m3u8';
        copy($urlHls, $tmp1);

        $dataHls = file_get_contents('DataHLS/'.$quality.'.m3u8');
        $dataHls = str_replace('master'.$quality.'.m3u8', $slug.$quality.'.m3u8', $dataHls);

        $dataHlsMaster = file_get_contents('data/'.$slug.'/'.$slug.'.m3u8');
        $dataHlsMaster = $dataHlsMaster.$dataHls;
        file_put_contents('data/'.$slug.'/'.$slug.'.m3u8', $dataHlsMaster);
        return 'ok';
    }
}
