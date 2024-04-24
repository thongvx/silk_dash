<?php

namespace App\Http\Controllers\play;


use App\Factories\DownloadFactory;
use App\Models\Video;
use App\Models\SvStorage;
use App\Models\EncoderTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class playController
{
    public function play($slug)
    {
        $data = Video::where('slug', $slug)->first();
        if(!empty($data) && $data->soft_delete == 0){
            if($data->origin == 0){
                //play origin
                $svUpload = EncoderTask::where('slug', $slug)->where('quality', 480)->value('sv_upload');
                $urlPlay = 'https://'.$svUpload.'.streamsilk.com/uploads/'.$slug.'.'.$data->format;
                return view('play', ['urlPlay' => $urlPlay]);
            }
            else{
                //play storage
                $urlPlay = 'http://127.0.0.1:8000/data/'.$slug.'/'.$slug.'.m3u8';
                return view('play', ['urlPlay' => $urlPlay]);
            }
        }
        else{
            echo '404 Not Found';
        }
    }
}
