<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Transfer;
use App\Models\User;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Redis;

class UpdateController extends Controller
{
    //-------------------------------update poster-------------------------------------------------
    function updatePoster(Request $request)
    {
        $slug = $request->slug;
        $poster = $request->poster;
        $poster_3 = $request->poster_3;
        $poster_5 = $request->poster_5;
        $poster = base64_decode($poster);
        $poster_3 = base64_decode($poster_3);
        $poster_5 = base64_decode($poster_5);
        //update poster
        $video = Video::where('slug', $slug)->first();
        if($video){
            $video->poster = $poster;
            $video->grid_poster_3 = $poster_3;
            $video->grid_poster_5 = $poster_5;
            $video->save();
            return response()->json(['status' => 'success']);
        }
        else{
            return response()->json(['status' => 'error']);
        }
    }
    public function uploadVideo(Request $request){
        $videoInfo = $request->all();
        $userId = $videoInfo['userId'];
        $user = User::find($userId);
        //Update user
        $videoSize = $videoInfo['size'];
        $user->increment('video');
        $user->increment('storage', $videoSize);
        $user->last_upload = time();
        $user->save();
        //check video
        $check_duplicate = md5($videoInfo['duration'].$videoSize.$videoInfo['quality']);
        $video = Video::where('check_duplicate', $check_duplicate)->first();
        $title = base64_decode($videoInfo['title']);
        $videoData = [
            'slug' => $videoInfo['slug'],
            'user_id' => $userId,
            'folder_id' => $videoInfo['folder'],
            'pathStream' => '0',
            'title' => $title,
            'poster' => '0',
            'grid_poster_3' => '0',
            'is_sub' => 0,
            'total_play' => 0,
            'size' => $videoSize,
            'duration' => $videoInfo['duration'],
            'quality' => $videoInfo['quality'],
            'format' => $videoInfo['format'],
            'origin' => 0,
            'soft_delete' => 0,
            'stream' => 0,
            'grid_poster_5' => '0',
        ];
        if($video){
            //create video exist
            $videoData['middle_slug'] = $video->middle_slug;
            $videoData['sd'] = $video->sd;
            $videoData['hd'] = $video->hd;
            $videoData['fhd'] = $video->fhd;
            $videoData['check_duplicate'] = 0;
        }else{
            $encoderPriority = $user->encoder_priority;
            $videoData['middle_slug'] = $videoInfo['slug'];
            $videoData['sd'] = '0';
            $videoData['hd'] = '19';
            $videoData['fhd'] = '19';
            $videoData['sv_upload'] = $videoInfo['sv'];
            $videoData['check_duplicate'] = $check_duplicate;
            //create encoder task 480
            $encoderTask480 = new EncoderTask();
            $encoderTask480->insertEncoderTask($videoData, $encoderPriority, 480);
            if($user->active > 1)
                $encoderTask480->save();
            //create encoder task 720
            if($videoInfo['quality'] > 480 || $user->active == 1){
                $encoderTask720 = new EncoderTask();
                $encoderTask720->insertEncoderTask($videoData, $encoderPriority, 720);
                $encoderTask720->save();
                $videoData['hd'] = '0';
            }
            //create encoder task 1080
            if($videoInfo['quality'] > 720 && $user->active > 1){
                $encoderTask1080 = new EncoderTask();
                $encoderTask1080->insertEncoderTask($videoData, $encoderPriority, 1080);
                $encoderTask1080->save();
                $videoData['fhd'] = '0';
            }
        }
        $video = Video::create($videoData);
        //check transfer
        $dataTransfer = Transfer::where('user_id', $userId)->where('slug', $videoInfo['slug'])->first();
        if($dataTransfer){
            $dataTransfer->status = 2;
            $dataTransfer->progress = 100;
            $dataTransfer->size_download = $videoSize;
            $dataTransfer->size = $videoSize;
            $dataTransfer->save();
            Redis::setex('transfer'.$videoInfo['userId'].'-'.$videoInfo['slug'], 300, json_encode([
                'slug' => $videoInfo['slug'],
                'url' => $dataTransfer->url,
                'status' => 2,
                'progress' => 100,
                'size_download' => $videoSize,
                'size' => $videoSize,
            ]));
        }
        return response()->json(['status' => 'success', 'message' => 'Upload success']);
    }
    //------------------------update info sv stream------------------------------------------------
    function updateInfoStream(Request $request)
    {
        $svStream = new SvStream();
        $svStream->name = $request->sv;
        $svStream->domain = $request->domain;
        $svStream->cpu = $request->cpu;
        $svStream->percent_space = $request->percent_space;
        $svStream->out_speed = $request->out_speed;
        $svStream->active = 1;

        SvStreamService::upsertSvStream($svStream);
    }
    //=============================================================================================
}
