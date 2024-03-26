<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Video;
use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class VideoController
{
    protected  $videoRepo;

    public function __construct(VideoRepo $videoRepo){
        $this->videoRepo = $videoRepo;
    }

    public function video(Request $request){

    }

    public function uploadVideo(Request $request){
        //Todo: Lấy danh sach các server có thể upload
        $serverUploads = [];

        //Cờ để lấy server
        $keyToGet = Redis::get('keyToGet');
        if (!isset($keyToGet)){
            $keyToGet = 0;
            Redis::set('keyToGet', $keyToGet);
        }

        $choiceServer = $serverUploads[$keyToGet];

        //Todo: Xử lý upload lên con choise server được chọn

        //Gắn lại lại cờ
        $keyToGet = $keyToGet + 1;
        if ($keyToGet >= count($serverUploads)){
            $keyToGet = 0;
        }
        Redis::set('keyToGet', $keyToGet);
    }
    // Hiển thị danh sách các video của user
    public function index(Request $request)
    {
        $user = Auth::user();
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'));
        return view('dashboard.videos.index', $data);
    }


}
