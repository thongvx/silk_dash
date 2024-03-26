<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Video;
use App\Repositories\VideoInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class VideoController
{
    protected VideoInfo $videoRepo;

    public function __construct(VideoInfo $videoRepo){
        $this->videoRepo = $videoRepo;
    }

    public function video(Request $request){

    }
    // Hiển thị danh sách các video của user
    public function index(Request $request)
    {
        $user = Auth::user();
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'));
        return view('dashboard.videos.index', $data);
    }


}
