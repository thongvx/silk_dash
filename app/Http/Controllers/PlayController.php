<?php

namespace App\Http\Controllers;


use App\Jobs\CreateHlsJob;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Video;
use Illuminate\Support\Facades\Queue;

class PlayController
{
    public function play($slug)
    {
        $data = Video::where('slug', $slug)->first();
        if(!empty($data) && $data->soft_delete == 0){
            $user_id = $data->user_id;
            $title = $data->title;
            if($data->check_duplicate == 0)
                $data = Video::where('slug', $data->middle_slug)->first();
            if($data->origin == 0){
                //play origin
                $svUpload = EncoderTask::where('slug', $slug)->where('quality', 480)->value('sv_upload');
                $urlPlay = 'https://'.$svUpload.'.streamsilk.com/uploads/'.$slug.'.'.$data->format;
                return view('play', ['urlPlay' => $urlPlay]);
            }
            else{
                //check stream
                if($data->pathStream == 0)
                    $data->pathStream = $this->selectPathStream($data->sd, $data->hd, $data->fhd);

                if($data->stream == 0){
                    $svStream = $this->selectSvStream();
                    Queue::push(new CreateHlsJob($data->middle_slug, $svStream, $data->pathStream, $data->sd, $data->hd, $data->fhd));
                    $data->stream = $svStream;
                    $data->save();
                }
                else{
                    $Stream = $data->stream;
                    $arrStream = explode('-', $Stream);
                    $svStream = $this->checkConnectSvStream($arrStream);
                    if(empty($svStream)){
                        $svStream = $this->selectSvStream();
                        Queue::push(new CreateHlsJob($data->middle_slug, $svStream, $data->pathStream, $data->sd, $data->hd, $data->fhd));
                        $data->stream = $data->stream .'-'. $svStream;
                        $data->save();
                    }
                }
                $arrPath = explode('-', $data->pathStream);
                $urlPlay = 'https://'.$svStream.'.streamsilk.com/data/'.$arrPath[1].'/'.$data->middle_slug.'/master.m3u8';
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
        $svStream = SvStream::where('active', 1)->where('cpu', '<', 10)->where('percent_space', '<', 95)->where('out_speed', '<', 700)->value('name');
        return $svStream;
    }
    //-------------------------------check connect sv stream----------------------------------------------
    function checkConnectSvStream($arrStream)
    {
        $svStream = SvStream::whereIn('name', $arrStream)
            ->where('out_speed', '<', 700)
            ->where('active', 1)
            ->orderBy('out_speed', 'asc')
            ->value('name');
        return $svStream;
    }
    //-----------------------------select path stream-----------------------------------------------------
    function selectPathStream($sd, $hd, $fhd)
    {
        $path = '0';
        if($sd != 0)
            $path = $sd;
        elseif ($hd != 0)
            $path = $hd;
        elseif ($fhd != 0)
            $path = $fhd;
        return $path;
    }
    //====================================================================================================
}
