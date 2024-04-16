<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Support\Facades\Auth;
use App\Factories\DownloadFactory;
use App\Models\User;
use App\Models\Video;
use App\Models\encoderTask;
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
        $video = Video::where('duration', $videoInfo['duration'])->where('size', $videoSize)->where('quality', $videoInfo['quality'])->first();
        if($video){
            //create video exist
            $middleSlug = $video->middle_slug;
            $videoNew = new Video();
            $videoNew->slug = $videoInfo['slug'];
            $videoNew->middle_slug = $middleSlug;
            $videoNew->user_id = $userId;
            $videoNew->folder_id = $videoInfo['folder'];
            $videoNew->sd = $video->sd;
            $videoNew->hd = $video->hd;
            $videoNew->fhd = $video->fhd;
            $videoNew->title = $videoInfo['title'];
            $videoNew->poster = '0';
            $videoNew->grid_poster = '0';
            $videoNew->is_sub = 0;
            $videoNew->total_play = 0;
            $videoNew->size = $videoSize;
            $videoNew->duration = $videoInfo['duration'];
            $videoNew->quality = $videoInfo['quality'];
            $videoNew->format = $videoInfo['format'];
            $videoNew->soft_delete = 0;
            $videoNew->save();
        }else{
            $encoderPriority = $user->encoder_priority;
            //create new video
            $videoNew = new Video();
            $videoNew->slug = $videoInfo['slug'];
            $videoNew->middle_slug = $videoInfo['slug'];
            $videoNew->user_id = $userId;
            $videoNew->folder_id = $videoInfo['folder'];
            $videoNew->sd = '0';
            $videoNew->hd = '0';
            $videoNew->fhd = '0';
            $videoNew->title = $videoInfo['title'];
            $videoNew->poster = '0';
            $videoNew->grid_poster = '0';
            $videoNew->is_sub = 0;
            $videoNew->total_play = 0;
            $videoNew->size = $videoSize;
            $videoNew->duration = $videoInfo['duration'];
            $videoNew->quality = $videoInfo['quality'];
            $videoNew->format = $videoInfo['format'];
            $videoNew->soft_delete = 0;
            $videoNew->save();
            //create encoder task 480
            $encoderTask480 = new encoderTask();
            $encoderTask480->user_id = $userId;
            $encoderTask480->slug = $videoInfo['slug'];
            $encoderTask480->status = 0;
            $encoderTask480->priority = $encoderPriority+2;
            $encoderTask480->quality = 480;
            $encoderTask480->size = $videoSize;
            $encoderTask480->sv_encoder = 0;
            $encoderTask480->sv_upload = 0;
            $encoderTask480->sv_storage = 0;
            $encoderTask480->start_encoder = 0;
            $encoderTask480->finish_encoder = 0;
            $encoderTask480->save();
            //create encoder task 720
            if($videoInfo['quality'] > 480){
                $encoderTask720 = new encoderTask();
                $encoderTask720->user_id = $userId;
                $encoderTask720->slug = $videoInfo['slug'];
                $encoderTask720->status = 0;
                $encoderTask720->priority = $encoderPriority+1;
                $encoderTask720->quality = 720;
                $encoderTask720->size = $videoSize;
                $encoderTask720->sv_encoder = 0;
                $encoderTask720->sv_upload = 0;
                $encoderTask720->sv_storage = 0;
                $encoderTask720->start_encoder = 0;
                $encoderTask720->finish_encoder = 0;
                $encoderTask720->save();
            }
            //create encoder task 1080
            if($videoInfo['quality'] > 720){
                $encoderTask1080 = new encoderTask();
                $encoderTask1080->user_id = $userId;
                $encoderTask1080->slug = $videoInfo['slug'];
                $encoderTask1080->status = 0;
                $encoderTask1080->priority = $encoderPriority;
                $encoderTask1080->quality = 1080;
                $encoderTask1080->size = $videoSize;
                $encoderTask1080->sv_encoder = 0;
                $encoderTask1080->sv_upload = 0;
                $encoderTask1080->sv_storage = 0;
                $encoderTask1080->start_encoder = 0;
                $encoderTask1080->finish_encoder = 0;
                $encoderTask1080->save();
            }

        }
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
