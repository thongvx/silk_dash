<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\VideoInfo;
use App\Repositories\VideoInfoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class VideoController
{
    protected VideoInfoRepo $videoRepo;

    public function __construct(VideoInfoRepo $videoRepo){
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
