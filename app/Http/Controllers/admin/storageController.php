<?php

namespace App\Http\Controllers\admin;


use App\Factories\DownloadFactory;
use App\Models\EncoderTask;
use App\Models\SvStorage;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class storageController
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
                CURLOPT_HTTPHEADER => array(
                    'Cookie: XSRF-TOKEN=eyJpdiI6IlBzVlBKVEdndTZpemhIWjRGT1FkS1E9PSIsInZhbHVlIjoieHhlOFN0WEZzT0pjVlZJL1JObmkyUnk0KzRra0V6OFAwQTk4SWdyRHliT2N2Ylp1bHJFWnlLQXMxZ0RPdEk4eFJkQXRLUDhkVjZnT0V4aWhiZlk4dS9hZFVXbGthV1plUTJPbys4NDhXNHhhR1ZMMkExMFFDUFFFdzNEd1BYTVUiLCJtYWMiOiIwNTBjNWYwZGNjZWQ3MjdiZDkyMDYyMDkwMjFkOTkzYzg0Yjg5NmU0MWRkNjdkODYzYjYwM2JmZmVlZDExMzlmIn0%3D; laravel_session=eyJpdiI6IlR0VXppL1RPcGFrd3hMWFdLTnFUeWc9PSIsInZhbHVlIjoiZWJHK01GWHE1cjZTTTI2ZjIvbjVET216ZnZ1Q3JMU3YycWVTNFRES0tZWHBzbk1pOWdoam1tK1ZEZlRUMUt6RS9ESUlNOFEybnYxVnFiV0QwM1ozNlFWWVRzVXJ5dlVXNVNFcVpoUHdFMGNlaGpyNit2Vms3TEV6M29xeG5xOWciLCJtYWMiOiJlNDFkNDQ0MjczZjNlZDJkMzExMTIwZGZhNWUwYzZlNGRhNTc4MzdjNDE5ZGYzNjdmYmJkMDNiMjYxNTE0NTRiIn0%3D'
                ),
            ));
            $response = curl_exec($curl);
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
            $dataVideo = Video::where('middle_slug',$encoderTaskInfo['slug'])->first();
            $dataVideo->sd = $encoderTaskInfo['path'];
            $dataVideo->origin = 1;
            $dataVideo->save();
            //create m3u8
            if(!file_exists('data/'.$encoderTaskInfo['slug']))
                mkdir('data/'.$encoderTaskInfo['slug']);
            if(!file_exists('data/'.$encoderTaskInfo['slug']).'/'. $encoderTaskInfo['slug'].'.m3u8')
                copy('DataHLS/master.m3u8', 'data/'.$encoderTaskInfo['slug'].'/'. $encoderTaskInfo['slug'].'.m3u8');
            if($encoderTaskInfo['quality'] == '480'){
                $this->createM3u8Quality($encoderTaskInfo['slug'], '480', $encoderTaskInfo['path']);
            }
            if($encoderTaskInfo['quality'] == '720'){
                $this->createM3u8Quality($encoderTaskInfo['slug'], '720', $encoderTaskInfo['path']);
            }
            if($encoderTaskInfo['quality'] == '1080'){
                $this->createM3u8Quality($encoderTaskInfo['slug'], '1080', $encoderTaskInfo['path']);
            }
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
