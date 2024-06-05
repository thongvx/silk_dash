<?php

namespace App\Http\Controllers\play;


use App\Factories\DownloadFactory;
use App\Models\Video;
use App\Models\SvStream;
use App\Models\EncoderTask;
use App\Jobs\CreateHlsJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Queue;

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
                //check stream
                if($data->stream == '0'){
                    $svStream = $this->selectSvStream();
                    Queue::push(new CreateHlsJob($data->middle_slug, $svStream, $data->pathStream, $data->sto480, $data->sto720, $data->sto1080));
                }
                else{
                    $Stream = $data->sv_stream;
                    $arrStream = explode('-', $Stream);
                    $svStream = SvStream::whereIn('domain', $arrStream)
                        ->where('out_speed', '<', 700)
                        ->where('active', 1)
                        ->orderBy('out_speed', 'asc')
                        ->value('domain');
                }
                $urlPlay = 'https://'.$svStream.'.streamsilk.com/data/'.$data->pathStream.'/'.$data->middle_slug.'/master.m3u8';
                return view('play', ['urlPlay' => $urlPlay]);
            }
        }
        else{
            echo '404 Not Found';
        }
    }
    //-------------------------------select sv stream-----------------------------------------------------
    function selectSvStream()
    {
        $svStream = SvStream::where('active', 1)->where('cpu', '<', 10)->where('percent_space', '<', 95)->where('out_speed', '<', 700)->value('domain');
        return $svStream;
    }
    //====================================================================================================
}
