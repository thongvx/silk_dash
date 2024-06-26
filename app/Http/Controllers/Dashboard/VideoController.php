<?php

namespace App\Http\Controllers\Dashboard;

use App\Notifications\NotificationService;
use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;
use App\Repositories\EncoderTaskRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function getVideoData(Request $request)
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
    public function convertFileSize($sizeInBytes)
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
    public function update($id,Request $request)
    {
        $video = $this->videoRepo->findWhere(['slug' => $id])->first();
        if (!$video) {
            $video = $this->videoRepo->findWhere(['id' => $id])->first();
        }

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $video->title = $request->newTitle;
        $video->save();
        $data=[
            'msg' => 'Ok',
            'status' => '200',
            'sever_time' => date('Y-m-d H:i:s'),
            'file' => [
                "New title" => $video->title,
                "videoID" => $video->slug,
            ],
        ];

        return response()->json($data);
    }
    // delete video
    public function destroyMultiple(Request $request)
    {
        $ids = $request->videoID;
        if (!is_array($ids)) {
            $ids = [$ids];
        }
        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'No video IDs provided'], 400);
        }

        foreach ($ids as $id) {
            $video = $this->videoRepo->findWhere(['slug' => $id])->first();
            if (!$video) {
                $video = $this->videoRepo->findWhere(['id' => $id])->first();
            }
            if ($video) {
                $folderId = $video->folder_id;
                $video->soft_delete = 1;
                $video->save();
                $video->deleteCache();
                $subject = 'Video Deleted: ' . $video->slug;
                $message = 'This video with ID: ' . $video->slug . ' (' . $video->title .')'. ' has been deleted.';
                $this->notificationService->addNotification(Auth::id(), $subject, $message, 'delete');

                // Update the number of files in the folder
                $this->folderRepo->updateNumberOfFiles($folderId);
            }else {
                return response()->json(['message' => 'Video not found: ' . $id], 404);
            }

        }

        return response()->json(['message' => 'Videos deleted successfully']);
    }
    // select2 video
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
                $oldFolderId = $video->folder_id;
                $video->folder_id = $validated['folder_id'];
                $video->save();

                $this->folderRepo->updateNumberOfFiles($oldFolderId);
                $this->folderRepo->updateNumberOfFiles($validated['folder_id']);
            }
        }

        // Return a response...
        return response()->json(['message' => 'Videos moved successfully!']);
    }
    public function findVideoBySlug(Request $request)
    {
        $user = Auth::user();
        $slug = $request->input('videoID');
        $limit = $request->input('limit', 20);
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $video = $this->videoRepo->searchVideos($user->id, $slug, $limit, $column, $direction)->first();
        $data=[
            'msg' => 'Ok',
            'status' => '200',
            'sever_time' => date('Y-m-d H:i:s'),
            'file' => [
                "title" => $video->title,
                "poster" => $video->poster,
                "sub" => $video->is_sub,
                "view" => $video->total_play,
                "date_uploaded" => $video->created_at->format('m/d/Y H:i:s'),
                "size" => $this->convertFileSize($video->size),
                "duration" => $video->duration,
                "quality" => $video->quality,
            ],
        ];
        return response()->json($data);
    }
    public function getListFile(Request $request){
        $user = Auth::user();
        $folderName = $request->get('nameFolder', 'root');
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 50);
        $folders = $this->folderRepo->getFolder($folderName);
        $folderId = $folders->id;
        $videos = $this->videoRepo->getAllUserVideo($user->id, 'live', 'created_at', 'desc', $folderId, $limit, ['*'], $page);
        $videoData = [];
        foreach ($videos as $video) {
            $videoData[] = [
                "title" => $video->title,
                "folder" => $folderName,
                "video_id" => $video->slug,
                "embedLink" => "https://user.streamsilk.com/t/".$video->slug,
                "poster" => $video->poster,
                "view" => $video->total_play,
                "size" => $this->convertFileSize($video->size),
                "date_uploaded" => $video->created_at->format('m/d/Y H:i:s'),
            ];
        }
        $data = [
            "msg" => "ok",
            "status" => 200,
            "sever_time" => date('Y-m-d H:i:s'),
            "total_video" => $videos->total(),
            "page" => $videos->currentPage(),
            'show' => $videos->firstItem() . ' to ' . $videos->lastItem() . ' of ' . $videos->total(),
            "file" => $videoData
        ];

        return response()->json($data);
    }
    public function cloneVideo(Request $request)
    {
        // Tìm video dựa trên ID
        $video = $this->videoRepo->findWhere(['slug' => $request->videoID])->first();
        $folderName = $request->get('nameFolder', 'root');
        $folders = $this->folderRepo->getFolder($folderName);
        $folderId = $folders->id;

        // Kiểm tra xem video có tồn tại không
        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        // Tạo một bản sao của video
        $clonedVideo = $video->replicate();
        $clonedVideo->title = $video->title . ' (Clone)';
        $clonedVideo->folder_id = $folderId;
        $clonedVideo->slug = uniqid();
        // Lưu bản sao vào cơ sở dữ liệu
        $clonedVideo->save();
        $this->folderRepo->updateNumberOfFiles($folderId);
        $data = [
            "msg" => "ok",
            "status" => 200,
            "sever_time" => date('Y-m-d H:i:s'),
            "file Clone" => [
                "title" => $clonedVideo->title,
                "folder" => $folderName,
                "video_id" => $clonedVideo->slug,
                "embedLink" => "https://user.streamsilk.com/t/".$clonedVideo->slug,
            ]
        ];

        return response()->json($data);
    }
    //rename video
    public function updateMultipleTitles(Request $request)
    {
        // Validate the request...
        $ids = $request->videoIds;
        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }
        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'No video IDs provided'], 400);
        }

        $updatedVideos = [];

        // Update the titles of the videos...
        foreach ($ids as $index => $id) {
            $video = $this->videoRepo->findWhere(['id' => $id])->first();
            $newTitle = $request->input($id);
            // Check if the new title is not null
            if ($newTitle === null) {
                continue;
            }

            if ($video) {
                $video->title = $newTitle;
                $video->save();

                $updatedVideos[] = [
                    'id' => $video->id,
                    'newTitle' => $newTitle
                ];
            } else {
                return response()->json(['message' => 'Video not found: ' . $id], 404);
            }
        }

        return response()->json($updatedVideos);
    }
    // Setting video
    public function editVideo($slug)
    {
        $data = [
            'title' => 'Setting Video',
            'video' => $this->videoRepo->findWhere(['slug' => $slug])->first(),
        ];
        return view('dashboard.video.settingVideo', $data);
    }

}
