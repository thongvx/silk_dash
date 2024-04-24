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

    // lay data video
    public function getVideoData(Request $request)
    {
        $user = Auth::user();
        $data['title'] = 'Video';
        // Lấy các thông tin từ request
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $folderId = $request->query('folderId', $this->videoRepo->getAllFolders($user->id)->first()->id);
        $limit = $request->input('limit', 20);

        // Lấy danh sách thư mục và tên thư mục hiện tại
        $data['folders'] = $this->videoRepo->getAllFolders($user->id);
        $data['currentFolderName'] = $this->videoRepo->getFolderName($folderId);

        // Lấy danh sách video theo cách sắp xếp mới
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'), $column, $direction, $folderId, $limit);

        // Lưu hướng và cột sắp xếp hiện tại
        $data['direction'] = $direction;
        $data['column'] = $column;

        // Chuyển đổi kích thước của video
        foreach ($data['videos'] as $video) {
            $video->size = $this->convertFileSize($video->size);
        }
        return $data;
    }
    // Hiển thị danh sách các video của user
    public function index(Request $request)
    {
        $user = Auth::user();
        $data['title'] = 'Video';
        $folderId = $this->videoRepo->getAllFolders($user->id)->first()->id;
        $data['currentFolderName'] = $this->videoRepo->getFolderName($folderId);
        $data['folders'] = $this->videoRepo->getAllFolders($user->id);
        $data['videos'] = $this->videoRepo->getAllUserVideo($user->id, $request->input('search'), 'created_at', 'asc', $folderId, 20);
        return view('videos.index', $data);
    }

    // Hàm sort
    public function control(Request $request)
    {
        $data = $this->getVideoData($request);

        return view('videos.table', $data);
    }
    //cover
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
