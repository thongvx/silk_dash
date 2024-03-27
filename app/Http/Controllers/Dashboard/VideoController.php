<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VideoController
{
    protected  $videoRepo;

    public function __construct(VideoRepo $videoRepo){
        $this->videoRepo = $videoRepo;
    }

    public function video(Request $request){

    }

    // Hiển thị danh sách các video của user
    public function index(Request $request)
    {
        $user = Auth::user();
        $limit = $request->input('limit', 20);
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'), $limit);
        return view('dashboard.videos.index', $data);
    }


}
