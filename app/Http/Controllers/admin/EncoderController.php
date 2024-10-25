<?php

namespace App\Http\Controllers\admin;

use App\Models\EncoderTask;
use App\Models\SvEncoder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;
use App\Jobs\CreateEncoderJob;
use App\Jobs\DeleteFileUploadJob;

class EncoderController
{
    public function startEncoderTask ()
    {
        $data = EncoderTask::where('status', 0)->orderBy('priority', 'desc')->first();
        $svEncoder = SvEncoder::where('active', 1)->where('encoder', '<', 2)->orderBy('encoder', 'asc')->first();
        if($data && $svEncoder){
            $data->increment('status');
            //select sv encoder
            if($data->sv_upload == $svEncoder->name)
                $statusEncoder = 2;
            else
                $statusEncoder = 0;
            $svEncoder->increment('encoder');
            $svEncoder->save();
            //call encoder
            //Queue::push(new CreateEncoderJob($data->slug, $svEncoder->name, $data->quality, $data->format, $statusEncoder, $data->sv_upload));
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://'.$svEncoder->name.'.encosilk.cc/addEncoderTask?slug='.$data->slug.'&quality='.$data->quality.'&format='.$data->format.'&status='.$statusEncoder.'&svUpload='.$data->sv_upload,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            $curlError = curl_error($curl);
            curl_close($curl);

            if($curlError){
                $data->decrement('status');
                $svEncoder->decrement('encoder');
                $svEncoder->save();
                return;
            }

            $data->sv_encoder = $svEncoder->name;
            $data->start_encoder = now();
            $data->save();
        }
    }
    public function finishEncoder(Request $request)
    {
        $encoderTaskInfo = $request->all();
        $data = EncoderTask::where('slug', $encoderTaskInfo['slug'])->where('quality', $encoderTaskInfo['quality'])->first();
        if($data){
            $data->status = 2;
            $data->sv_encoder = $encoderTaskInfo['sv'];
            $data->finish_encoder = now();
            $data->save();
            //update sv encoder
            $encoderTask = EncoderTask::where('sv_encoder', $encoderTaskInfo['sv'])->where('status', 1)->count();
            $svEncoder = SvEncoder::where('name', $encoderTaskInfo['sv'])->first();
            $svEncoder->encoder = $encoderTask;
            $svEncoder->save();
        }
    }
    public function deleteFinishedEncoderTask()
    {
        $data = EncoderTask::select('slug', 'sv_upload', 'format')
            ->groupBy('slug', 'sv_upload', 'format')
            ->havingRaw('COUNT(DISTINCT status) = 1 AND MAX(status) = 4')
            ->first();
        if($data){
            Queue::push(new DeleteFileUploadJob($data->slug, $data->sv_upload, $data->format));
            EncoderTask::where('slug', $data->slug)->delete();
            Redis::del('encoserTask:'.$data->slug);
            return json_encode($data);
        }
    }

    function getTaskEncoderVideo($name)
    {
        $data = EncoderTask::where('status', 0)->where('quality', 720)->orderBy('priority', 'desc')->first();
        if($data){
            $dataUpdate['status'] = 1;
            $dataUpdate['sv_encoder'] = $name;
            $dataUpdate['start_encoder'] = now();
            EncoderTask::where('slug', $data->slug)->update($dataUpdate);
            $quality480 = EncoderTask::where('slug', $data->slug)->where('status', 0)->where('quality', 480)->first();
            $quality1080 = EncoderTask::where('slug', $data->slug)->where('status', 0)->where('quality', 1080)->first();

            $data1['originVideo'] = $data->slug;
            $data1['q720'] = 1;
            $data1['sv'] = $data->sv_upload;
            if($quality480){
                $data1['q480'] = 1;
            }
            else{
                $data1['q480'] = 0;
            }
            if($quality1080){
                $data1['q1080'] = 1;
            }
            else{
                $data1['q1080'] = 0;
            }
            return json_encode($data1);

        }
        else{
            return 'no task';
        }
    }
    function encoderFaild(Request $request)
    {
        $slug = $request->slug;
        $quality = $request->quality;
        $svEncoder = $request->sv;
        $data['status'] = 19;
        EncoderTask::where('slug', $slug)->where('quality', $quality)->update($data);
        if($svEncoder != 'no'){
            SvEncoder::where('name', $svEncoder)->decrement('encoder');
        }
        echo $svEncoder;
    }
    function checkExistsEncoderTask($slug)
    {
        if (Redis::exists('encoserTask:'.$slug)) {
            return 1;
        } else {
            return 0;
        }
    }
}
