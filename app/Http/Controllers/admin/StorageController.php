<?php

namespace App\Http\Controllers\admin;


use App\Factories\DownloadFactory;
use App\Models\EncoderTask;
use App\Models\SvStorage;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class StorageController
{
    public function startStorageTask ()
    {
        $data = EncoderTask::where('status', 2)->orderBy('priority', 'desc')->first();
        if($data){
            $data->increment('status');
            //select sv encoder
            $svStorage = SvStorage::where('active', 1)->where('in_data', 1)->where('percent_space', '<', 96)->where('out_speed', '<', 700)->inRandomOrder()->first();

            //call encoder
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://'.$svStorage->name.'.streamsilk.com/startStorageTask?slug='.$data->slug.'&sv='.$data->sv_encoder.'&quality='.$data->quality,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            echo $response;
            curl_close($curl);
        }
    }
    public function finishStorage(Request $request)
    {
        $encoderTaskInfo = $request->all();
        $data = EncoderTask::where('slug', $encoderTaskInfo['slug'])->where('quality', $encoderTaskInfo['quality'])->first();
        if($data){
            $data->status = 4;
            $data->sv_storage = $encoderTaskInfo['sv'];
            $data->finish_encoder = time();
            $data->save();
            $selectQuality = 'sd';
            if($encoderTaskInfo['quality'] == '720')
                $selectQuality = 'hd';
            if($encoderTaskInfo['quality'] == '1080')
                $selectQuality = 'fhd';
            $dataVideo = Video::where('middle_slug',$encoderTaskInfo['slug'])->first();
            $dataVideo->$selectQuality = $encoderTaskInfo['path'];
            $dataVideo->origin = 1;
            $dataVideo->save();
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
