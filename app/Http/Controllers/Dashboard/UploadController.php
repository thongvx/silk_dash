<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Support\Facades\Auth;
use App\Factories\DownloadFactory;
use App\Models\User;
use App\Models\Video;
use App\Models\EncoderTask;
use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UploadController
{
    protected  $videoRepo;
    //Trả về giao diện upload
    public function __construct(VideoRepo $videoRepo){
        $this->videoRepo = $videoRepo;
    }
    public function upload(Request $request){

        //Lam giau thong tin
        $user = Auth::user();
        $data['title'] = 'Upload';
        $data['folders'] = $this->videoRepo->getAllFolders(1);
        return view('upload.upload', $data);

    }

    //Xử lý gọi vào hàm này để đẩy videos lên
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
        $videoData = [
            'slug' => $videoInfo['slug'],
            'user_id' => $userId,
            'folder_id' => $videoInfo['folder'],
            'title' => $videoInfo['title'],
            'poster' => '0',
            'grid_poster' => '0',
            'is_sub' => 0,
            'total_play' => 0,
            'size' => $videoSize,
            'duration' => $videoInfo['duration'],
            'quality' => $videoInfo['quality'],
            'format' => $videoInfo['format'],
            'origin' => 0,
            'soft_delete' => 0,
        ];
        if($video){
            //create video exist
            $videoData['middle_slug'] = $video->middle_slug;
            $videoData['sd'] = $video->sd;
            $videoData['hd'] = $video->hd;
            $videoData['fhd'] = $video->fhd;
            $videoData['check_duplicate'] = $videoInfo['slug'];
        }else{
            $encoderPriority = $user->encoder_priority;
            $videoData['middle_slug'] = $videoInfo['slug'];
            $videoData['sd'] = '0';
            $videoData['hd'] = '0';
            $videoData['fhd'] = '0';
            $videoData['sv_upload'] = $videoInfo['sv'];
            $videoData['check_duplicate'] = $check_duplicate;
            //create encoder task 480
            $encoderTask480 = new EncoderTask();
            $encoderTask480->insertEncoderTask($videoData, $encoderPriority, 480);
            $encoderTask480->save();
            //create encoder task 720
            if($videoInfo['quality'] > 480){
                $encoderTask720 = new EncoderTask();
                $encoderTask720->insertEncoderTask($videoData, $encoderPriority, 720);
                $encoderTask720->save();
            }
            //create encoder task 1080
            if($videoInfo['quality'] > 720){
                $encoderTask1080 = new EncoderTask();
                $encoderTask1080->insertEncoderTask($videoData, $encoderPriority, 1080);
                $encoderTask1080->save();
            }
        }
        $video = Video::create($videoData);
        return response()->json(['status' => 'success', 'message' => 'Upload success']);
    }
    public function remoteUploadDirect(Request $request)
    {
        $url = $request->input('url');
        $this->remoteUpload($url);
    }
    //Cho phép người dùng upload từ url
    public function remoteUpload($url)
    {
        try {
            $download = DownloadFactory::create($url);
            $download->download();

        } catch (\Exception $e) {
            $key = 'uploadProgress.'.$url;
            Redis::setex($key, 3600, 'error: '.$e->getMessage());
        }
    }

    public function getProgress(Request $request)
    {
        $progressKey = 'uploadProgress.'.$request->input('key');
        $progress = Redis::get($progressKey);

        if ($progress === null) {
            return response()->json(['error' => 'Progress not found'], 404);
        }

        return $progress;
    }

}
