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
        $folderId = $request->query('folderId', 1);
        $limit = $request->input('limit', 20);
        $data['folders'] = $this->videoRepo->getAllFolders($user->id);
        $data['currentFolderName'] = $this->videoRepo->getFolderName($folderId);
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'), $folderId, $limit);
        foreach ($data['videos'] as $video) {
            $video->size = $this->convertFileSize($video->size);
        }
        return view('dashboard.videos.index', $data);
    }
    private function convertFileSize($sizeInBytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $i = 0;
        while ($sizeInBytes > 1024) {
            $sizeInBytes /= 1024;
            $i++;
        }

        return round($sizeInBytes, 2) . ' ' . $units[$i];
    }

}
