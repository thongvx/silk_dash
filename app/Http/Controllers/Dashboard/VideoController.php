<?php

namespace App\Http\Controllers\Dashboard;

use App\Notifications\NotificationService;
use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;
use App\Repositories\EncoderTaskRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController
{
    protected $videoRepo;
    protected $folderRepo;
    protected $encoderTaskRepo;
    protected $notificationService;


    public function __construct(VideoRepo $videoRepo, FolderRepo $folderRepo, EncoderTaskRepo $encoderTaskRepo, NotificationService $notificationService)
    {
        $this->videoRepo = $videoRepo;
        $this->folderRepo = $folderRepo;
        $this->encoderTaskRepo = $encoderTaskRepo;
        $this->notificationService = $notificationService;
    }

    // Get video data
    private function getVideoData(Request $request)
    {
        $user = Auth::user();
        $folderId = $request->get('folderId');
        $folders = $this->folderRepo->getAllFolders($user->id);
        $folderId = $folderId ?? $folders->last()->id;
        $data = [
            'title' => 'Video',
            'folders' => $folders,
            'currentFolderName' => $folders->firstWhere('id', $folderId),
            'direction' => $request->input('direction', 'desc'),
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
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'desc');
        $limit = $request->input('limit', 20);
        $page = $request->input('page', 1);
        if ($tab == 'processing') {
            $videos =  $this->encoderTaskRepo->getAllEncoderTasks($userId);
        } else {
            $videos = $this->videoRepo->getAllUserVideo($userId, $tab, $column, $direction, $folderId, $limit, ['*'], $page);
        }
        return $videos;
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
        return view('dashboard.video.index', $data);
    }
    // Control
    public function control(Request $request)
    {
        $data = $this->getVideoData($request);
        $tab = $request->input('tab');
        if ($tab != 'processing') {
            return view('dashboard.video.table', $data);
        }else {
            return response('');
        }
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

        //delete cache
        $video->deleteCache();

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
                $video->deleteCache();
                $subject = 'Video Deleted: ' . $video->slug;
                $message = 'This video with ID: ' . $video->slug . ' (' . $video->title .')'. ' has been deleted.';
                $this->notificationService->addNotification(Auth::id(), $subject, $message, 'delete');
            }else {
                return response()->json(['message' => 'Video not found: ' . $id], 404);
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

        return view('dashboard.video.search', $data);
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
