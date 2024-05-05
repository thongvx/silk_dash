<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\VideoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController
{
    protected $videoRepo;

    public function __construct(VideoRepo $videoRepo)
    {
        $this->videoRepo = $videoRepo;
    }

    public function getVideoData(Request $request)
    {
        $user = Auth::user();
        $folderId = $request->query('folderId');
        $folders = $this->videoRepo->getAllFolders($user->id);
        $folderId = $folderId ?? $folders->first()->id;

        $data = [
            'title' => 'Video',
            'folders' => $folders,
            'currentFolderName' => $folders->firstWhere('id', $folderId),
            'direction' => $request->input('direction', 'asc'),
            'column' => $request->input('column', 'created_at'),
            'videos' => $this->getVideos($request, $user->id, $folderId),
            'poster' => $request->input('poster'),
        ];

        $this->convertVideoSizes($data['videos']);

        return $data;
    }

    private function getVideos(Request $request, $userId, $folderId)
    {
        $tab = request()->get('tab');
        $search = $request->input('search');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $limit = $request->input('limit', 20);

        return $this->videoRepo->getAllUserVideo($userId, $tab, $search, $column, $direction, $folderId, $limit);
    }

    private function convertVideoSizes($videos)
    {
        foreach ($videos as $video) {
            $video->size = $this->convertFileSize($video->size);
        }
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

    public function index(Request $request)
    {
        $data = $this->getVideoData($request);
        return view('video.index', $data);
    }

    public function control(Request $request)
    {
        $data = $this->getVideoData($request);
        return view('video.table', $data);
    }
}
