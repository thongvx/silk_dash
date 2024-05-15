<?php

namespace App\Http\Controllers\Dashboard;

use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController
{
    protected $videoRepo;
    protected $folderRepo;

    public function __construct(VideoRepo $videoRepo, FolderRepo $folderRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->folderRepo = $folderRepo;
    }

    // Get video data
    public function getVideoData(Request $request)
    {
        $user = Auth::user();
        $folderId = $request->query('folderId');
        $folders = $this->folderRepo->getAllFolders($user->id);
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
    // Get videos
    private function getVideos(Request $request, $userId, $folderId)
    {
        $tab = request()->get('tab');
        $search = $request->input('search');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $limit = $request->input('limit', 20);

        return $this->videoRepo->getAllUserVideo($userId, $tab, $search, $column, $direction, $folderId, $limit);
    }
    // Convert video sizes
    private function convertVideoSizes($videos)
    {
        foreach ($videos as $video) {
            $video->size = $this->convertFileSize($video->size);
        }
    }
    // Convert file size
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
    // view index video
    public function index(Request $request)
    {
        $data = $this->getVideoData($request);
        return view('video.index', $data);
    }
    // Control
    public function control(Request $request)
    {
        $data = $this->getVideoData($request);
        return view('video.table', $data);
    }

    // update video
    public function update($id, Request $request)
    {
        $video = $this->videoRepo->find($id);

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $video->title = $request->title;
        $video->save();

        return response()->json(['message' => 'Video title updated successfully']);
    }
    // delete video
    public function destroyMultiple(Request $request)
    {
        $ids = $request->ids;

        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'No video IDs provided'], 400);
        }

        foreach ($ids as $id) {
            $video = $this->videoRepo->find($id);
            if ($video) {
                $video->delete();
            }
        }

        return response()->json(['message' => 'Videos deleted successfully']);
    }
    // search video
    public function show(Request $request)
    {
        $user = Auth::user();
        $searchTerm = $request->input('videoID');
        $limit = $request->input('limit', 20);
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $videos = $this->videoRepo->searchVideos($user->id, $searchTerm, $limit, $column, $direction);
        $folders = $this->folderRepo->getAllFolders($user->id);


        $data = [
            'title' => 'Search Results',
            'videos' => $videos,
            'folders' => $folders,
            'column' => $request->input('column', 'created_at'),
            'direction' => $request->input('direction', 'asc'),
        ];

        return view('video.search', $data);
    }
    //mover video
    public function moveVideos(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'folder_id' => 'required|exists:folders,id',
            'video_ids' => 'required|array',
            'video_ids.*' => 'exists:videos,id',
        ]);

        // Find the videos and update their folder_id...
        foreach ($validated['video_ids'] as $videoId) {
            $video = $this->videoRepo->find($videoId);
            if ($video) {
                $video->folder_id = $validated['folder_id'];
                $video->save();
            }
        }

        // Return a response...
        return response()->json(['message' => 'Videos moved successfully!']);
    }

}
