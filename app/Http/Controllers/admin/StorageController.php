<?php

namespace App\Http\Controllers\admin;


use App\Factories\DownloadFactory;
use App\Jobs\CreatStorageJob;
use App\Jobs\DeleteVideoEncoder;
use App\Models\EncoderTask;
use App\Models\SvStorage;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;


class StorageController
{
    public function startStorageTask ()
    {
        $data = EncoderTask::where('status', 2)->orderBy('priority', 'desc')->first();
        if($data){
            $data->increment('status');
            //select sv encoder
            $svStorage = SvStorage::where('active', 1)->where('in_data', 1)->where('percent_space', '<', 96)->where('out_speed', '<', 900)->inRandomOrder()->first();
            $data->sv_storage = $svStorage->name;
            $data->save();
            //call sto
            //Queue::push(new CreatStorageJob($data->slug, $svStorage->name, $data->quality, $data->sv_encoder));
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://'.$svStorage->name.'.stosilk.cc/startStorageTask?slug='.$data->slug.'&sv='.$data->sv_encoder.'&quality='.$data->quality,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',

            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
        }
    }
    public function finishStorage(Request $request)
    {
        $slug = $request->slug;
        $sv = $request->sv;
        $quality = $request->quality;
        $path = $request->path;
        $data = EncoderTask::where('slug', $slug)->where('quality', $quality)->first();
        if($data){
            $data->status = 4;
            $data->sv_storage = $sv;
            $data->finish_encoder = now();
            $data->save();
            $selectQuality = 'sd';
            if($quality == '720')
                $selectQuality = 'hd';
            if($quality == '1080')
                $selectQuality = 'fhd';
            $dataVideo = Video::where('middle_slug',$slug)->first();
            $dataVideo->$selectQuality = $path;
            $dataVideo->origin = 1;
            $dataVideo->save();
            if($sv != 'no')
                Queue::push(new DeleteVideoEncoder($data->slug, $data->sv_upload, $data->quality));
        }
    }

    function createM3u8Quality($slug, $quality, $path)
    {
        $arrPath = explode('-', $path);
        $svSto = SvStorage::where('name', $arrPath[0])->first();
        $subDomain = str_replace('st', 'cdn', $svSto->name);
        $urlM3u8 = 'https://'.$subDomain.'.'.$svSto->domain.'/data/'.$arrPath[1].'/'.$arrPath[2].'/'.$slug.'/'.$slug.$quality.'.m3u8';
        $dataHls = file_get_contents('DataHLS/'.$quality.'.m3u8');
        $dataHls = str_replace('master'.$quality.'.m3u8', $urlM3u8, $dataHls);

        $dataHlsMaster = file_get_contents('data/'.$slug.'/'.$slug.'.m3u8');
        $dataHlsMaster = $dataHlsMaster.$dataHls;
        file_put_contents('data/'.$slug.'/'.$slug.'.m3u8', $dataHlsMaster);
    }
}
