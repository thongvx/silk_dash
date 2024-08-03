<?php

namespace App\Http\Controllers\admin;

use App\Enums\VideoCacheKeys;
use App\Http\Controllers\Controller;
use App\Models\EncoderTask;
use App\Models\SvStream;
use App\Models\Transfer;
use App\Models\User;
use App\Models\SvDownload;
use App\Models\SvEncoder;
use App\Services\ServerStream\SvStreamService;
use App\Services\ServerDownload\SvDownloadService;
use App\Services\ServerEncoder\SvEncoderService;
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
            Redis::del(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug);
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
            $encoderTask480->insertEncoderTask($videoData, $encoderPriority+2, 480);
            if($user->active > 1)
                $encoderTask480->save();
            //create encoder task 720
            if($videoInfo['quality'] > 480 || $user->active == 1){
                $encoderTask720 = new EncoderTask();
                $encoderTask720->insertEncoderTask($videoData, $encoderPriority+1, 720);
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
        $subtitle = base64_decode($videoInfo['subtitle']);
        if($subtitle != 0){
            $folderPath = storage_path('app/public/subtitles/'.$videoInfo['slug']);
            //create folder
            if(!file_exists($folderPath)){
                mkdir($folderPath, 0777, true);
            }
            $subtitle = json_decode($subtitle, true);
            foreach ($subtitle as $key => $value){
                if(!file_exists($folderPath.'/'.$value['name_file'])){
                    $url_file_sub = 'https://streamsilk.com/storage/subtitles/'.$videoInfo['slug'].'/'.$value['name_file'];
                    $dataSub = [[
                        'kind' => 'captions',
                        'file' => $url_file_sub,
                        'label' => $value['language'],
                    ]];
                    //file sub all
                    if(!file_exists($folderPath.'/'.$videoInfo['slug'].'.json')){
                        $dataSub = json_encode($dataSub);
                        file_put_contents($folderPath.'/'.$videoInfo['slug'].'.json', $dataSub);
                    }
                    else{
                        $jsonContent = file_get_contents($folderPath.'/'.$videoInfo['slug'].'.json');
                        $dataSubOld = json_decode($jsonContent, true);
                        $dataSubNew = array_merge($dataSubOld, $dataSub);
                        $dataSubNew = json_encode($dataSubNew);
                        file_put_contents($folderPath.'/'.$videoInfo['slug'].'.json', $dataSubNew);
                    }
                    $tmp1 = 'https://'.$videoInfo['sv'].'.encosilk.cc/subtitle/'.$value['name_file'];
                    copy($tmp1, $folderPath.'/'.$value['name_file']);
                }
            }
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
    //------------------------update info sv download----------------------------------------------
    function updateInfoDownload(Request $request)
    {
        $svDownload = new SvDownload();
        $svDownload->name = $request->sv;
        $svDownload->cpu = $request->cpu;
        $svDownload->percent_space = $request->percent_space;
        $svDownload->out_speed = $request->out_speed;
        $svDownload->active = 1;

        SvDownloadService::upsertSvDownload($svDownload);
    }
    function updateInfoEncoder(Request $request)
    {
        $svEncoder = new SvEncoder();
        $svEncoder->name = $request->sv;
        $svEncoder->cpu = $request->cpu;
        $svEncoder->usedSpace = $request->usedSpace;
        $svEncoder->percent_space = $request->percent_space;
        $svEncoder->inSpeed = $request->inSpeed;
        $svEncoder->out_speed = $request->out_speed;
        $svEncoder->encoder_task = $request->encoder_task;
        $svEncoder->transfer_task = $request->transfer_task;
        $svEncoder->taskFF = base64_decode($request->taskFF);
        $svEncoder->active = 1;

        SvEncoderService::upsertSvEncoder($svEncoder);
    }
    //=============================================================================================
}
