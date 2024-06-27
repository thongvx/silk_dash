<?php

namespace App\Http\Controllers\admin;

use App\Models\EncoderTask;
use App\Models\SvEncoder;
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
        $svEncoder = SvEncoder::where('active', 1)->where('encoder', '<', 2)->first();
        if($data && $svEncoder){
            $data->increment('status');
            //select sv encoder
            if($data->sv_upload == $svEncoder->name)
                $statusEncoder = 2;
            else
                $statusEncoder = 0;
            //call encoder
            Queue::push(new CreateEncoderJob($data->slug, $svEncoder->name, $data->quality, $data->format, $statusEncoder, $data->sv_upload));

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
    public function deleteFinishedEncoderTask()
    {
        $data = EncoderTask::select('slug')
            ->groupBy('slug')
            ->havingRaw('COUNT(DISTINCT status) = 1 AND MAX(status) = 4')
            ->first();
        if($data){
            Queue::push(new DeleteFileUploadJob($data->slug, $data->sv_upload, $data->format));
            EncoderTask::where('slug', $data->slug)->delete();
            return json_encode($data);
        }
    }
}
