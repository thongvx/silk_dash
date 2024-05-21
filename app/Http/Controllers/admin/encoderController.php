<?php

namespace App\Http\Controllers\admin;


use App\Factories\DownloadFactory;
use App\Models\EncoderTask;
use App\Models\SvEncoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class encoderController
{
    public function startEncoderTask ()
    {
        $data = EncoderTask::where('status', 0)->orderBy('priority', 'desc')->first();
        if($data){
            $data->increment('status');
            //select sv encoder
            $svEncoder = SvEncoder::where('active', 1)->where('encoder', '<', 2)->first();
            if($data->sv_upload == $svEncoder->name)
                $statusEncoder = 2;
            else
                $statusEncoder = 0;
            //call encoder
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://'.$svEncoder->name.'.streamsilk.com/addEncoderTask?status='.$statusEncoder.'&slug='.$data->slug.'&sv='.$data->sv_upload.'&format='.$data->format.'&quality='.$data->quality,
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

            $svEncoder->increment('encoder');
        }
    }
    public function finishEncoder(Request $request)
    {
        $encoderTaskInfo = $request->all();
        $data = EncoderTask::where('slug', $encoderTaskInfo['slug'])->where('quality', $encoderTaskInfo['quality'])->first();
        if($data){
            $data->status = 2;
            $data->sv_encoder = $encoderTaskInfo['sv'];
            $data->finish_encoder = time();
            $data->save();
            //update sv encoder
            $svEncoder = SvEncoder::where('name', $encoderTaskInfo['sv'])->first();
            $svEncoder->decrement('encoder');
            $svEncoder->save();
        }
    }
}
