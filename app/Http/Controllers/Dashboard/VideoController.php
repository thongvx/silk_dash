<?php

namespace App\Http\Controllers\Dashboard;

use App\Jobs\CreatStreamAudioJob;
use App\Notifications\NotificationService;
use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;
use App\Repositories\EncoderTaskRepo;
use App\Repositories\TransferRepo;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redis;
use App\Repositories\PlayerSettingsRepo;
use App\Http\Controllers\Dashboard\UploadController;


class VideoController
{
    protected $videoRepo, $folderRepo, $encoderTaskRepo, $notificationService, $uploadController, $playerSettingsRepo, $transferRepo;

    public function __construct(VideoRepo $videoRepo, FolderRepo $folderRepo, EncoderTaskRepo $encoderTaskRepo,
                                NotificationService $notificationService, UploadController $uploadController,
                                PlayerSettingsRepo $playerSettingsRepo, TransferRepo $transferRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->folderRepo = $folderRepo;
        $this->encoderTaskRepo = $encoderTaskRepo;
        $this->notificationService = $notificationService;
        $this->uploadController = $uploadController;
        $this->playerSettingsRepo = $playerSettingsRepo;
        $this->transferRepo = $transferRepo;
    }

    // Get video data
    public function getVideoData(Request $request)
    {
        $user = Auth::user();
        $folderId = $request->get('folderId');
        $folders = $this->folderRepo->getAllFolders($user->id);
        $folderId = $folderId ?? $folders->last()->id;
        $playerSettings = $this->playerSettingsRepo->getAllPlayerSettings($user->id);

        $data = [
            'title' => 'Video',
            'folders' => $folders,
            'currentFolderName' => $folders->firstWhere('id', $folderId),
            'direction' => $request->input('direction', 'desc'),
            'column' => $request->input('column', 'created_at'),
            'videos' => $this->getVideos($request, $user->id, $folderId),
            'poster' => $request->input('poster'),
            'playerSettings' => $playerSettings,
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
            $videos =  $this->encoderTaskRepo->getAllEncoderTasks($userId, $column, $direction, $limit, $page);
        } else {
            $videos = $this->videoRepo->getAllUserVideo($userId, $tab, $column, $direction, $folderId, $limit, $page, ['*']);
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
        $tab = $request->input('tab');
        if ($tab != 'processing') {
            if($request->input('videoID')) {
                $data = $this->getDataSearch($request);
            }else{
                $data = $this->getVideoData($request);
            }
            return view('dashboard.video.table', $data);
        }else {
            $data = $this->getVideoData($request);
            return view('dashboard.video.tableProcessing', $data);
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
            return response()->json([
                "msg" => "No video found",
                "status" => 404,
                "sever_time" => date('Y-m-d H:i:s'),
            ]);
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

                $this->folderRepo->decrementNumberOfFiles($folderId);
                // Update the number of files in the folder
                $encoders = $this->encoderTaskRepo->findWhere(['slug' => $video->slug]);
                if ($encoders) {
                    $encoders->each(function ($encoder) {
                        $encoder->delete();
                    });
                }
            }else {
                return response()->json(
                    [
                        'msg' => 'Error',
                        'status' => '404',
                        'sever_time' => date('Y-m-d H:i:s'),
                        'result' => 'Video not found: ' . $id
                    ]
                );
            }

        }
        return response()->json(
            [
                'msg' => 'Ok',
                'status' => '200',
                'sever_time' => date('Y-m-d H:i:s'),
                'result' => 'Videos deleted successfully'
            ]
        );
    }
    // select2 video
    public function getDataSearch(Request $request)
    {
        $user = Auth::user();
        $searchTerm = $request->input('videoID');
        $limit = $request->input('limit', 20);
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $videos = $this->videoRepo->searchVideos($user->id, $searchTerm, $limit, $column, $direction);
        $folders = $this->folderRepo->getAllFolders($user->id);
        $playerSettings = $this->playerSettingsRepo->getAllPlayerSettings($user->id);
        $data = [
            'title' => 'Search Results',
            'videos' => $videos,
            'folders' => $folders,
            'column' => $request->input('column', 'created_at'),
            'direction' => $request->input('direction', 'asc'),
            'searchTerm' => $searchTerm,
            'playerSettings' => $playerSettings,
        ];
        $this->convertVideoSizes($data['videos']);
        return $data;
    }
    public function show(Request $request)
    {
        $data = $this->getDataSearch($request);

        return view('dashboard.video.search', $data);
    }
    //mover video
    public function moveVideos(Request $request)
    {

        // Validate the request...
        $validated = $request->validate([
            'folderID' => 'required|exists:folders,id',
        ]);
        $videoIDs = $request->input('videoID');
        if (is_string($videoIDs)) {
            $videoIDs = explode(',', $videoIDs);
        }
        if (!$validated) {
            return response()->json(['message' => 'Invalid request'], 400);
        }
        // Find the videos and update their folder_id...
        foreach ($videoIDs as $videoId) {
            $video = $this->videoRepo->findWhere(['slug' => $videoId])->first();
            if ($video) {
                $oldFolderId = $video->folder_id;
                $video->folder_id = $validated['folderID'];
                $video->save();

                $this->folderRepo->decrementNumberOfFiles($oldFolderId);
                $this->folderRepo->incrementNumberOfFiles($validated['folderID']);
            } else {
                return response()->json(['message' => 'Video not found: ' . $videoId], 404);
            }
        }

        return response()->json(
            [
                'msg' => 'Success',
                'status' => '200',
                'sever_time' => date('Y-m-d H:i:s'),
                'result' => 'Videos moved successfully!'
            ]
        );
    }
    public function findVideoBySlug(Request $request)
    {
        $user = Auth::user();
        $slug = $request->input('videoID');
        $limit = $request->input('limit', 20);
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $video = $this->videoRepo->searchVideos($user->id, $slug, $limit, $column, $direction)->first();
        $page = $request->input('page', 1);
        $transfer = $this->transferRepo->getTransferById($slug, $user->id);
        if($transfer != null){
            if($transfer->status == 19){
                $status = "fail";
            }else{
                $status = 'transferring';
            }
        }
        if ( $transfer != null) {
            return response()->json([
                "msg" => "Ok",
                "status" => 200,
                "sever_time" => date('Y-m-d H:i:s'),
                "file" => [
                    "status" => 'transfer: '. $status,
                ]
            ]);
        }
        $encoder = $this->encoderTaskRepo->getAllEncoderTasks($user->id, $column, $direction, $limit, $page)->where('slug', $slug)->first();

        if($video == null){
            return response()->json([
                "msg" => "No video found",
                "status" => 404,
                "sever_time" => date('Y-m-d H:i:s'),
            ]);
        }
        if($video->soft_delete == 1){
            $status = 'deleted';
        }else{
            $status = 'active';
        }

        if($encoder != null){
            if($encoder->status == 0) {
                $status = 'encoder: processing';
            }elseif ($encoder->status == 19){
                $status = 'encoder: failed';
            }elseif ($encoder->status == 4){
                $status = 'encoder: completed';
            } else{
                $status = 'encoder: processing';
            }
        }
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
                "status" => $status,
            ],
        ];
        return response()->json($data);
    }
    public function getListFile(Request $request){
        $user = Auth::user();
        $folderName = $request->get('nameFolder', 'root');
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 50);
        $column = $request->get('column', 'created_at');
        $direction = $request->get('direction', 'desc');
        $folders = $this->folderRepo->getFolder($user->id,$folderName);
        if ($folders == null) {
            return response()->json([
                "msg" => "No folder found",
                "status" => 404,
                "sever_time" => date('Y-m-d H:i:s'),
            ]);
        }
        $folderId = $folders->id;
        $videos = $this->videoRepo->getAllUserVideo($user->id, 'live', 'created_at', 'desc', $folderId, $limit, $page, ['*']);
        $videoData = [];
        if($videos->isEmpty()){
            return response()->json([
                "msg" => "No video found",
                "status" => 404,
                "sever_time" => date('Y-m-d H:i:s'),
            ]);
        }
        foreach ($videos as $video) {
            if($video->soft_delete == 1){
                $status = 'deleted';
            }else{
                $status = 'active';
            }
            $encoder = $this->encoderTaskRepo->getAllEncoderTasks($user->id, $column, $direction, $limit, $page)->where('slug', $video->slug)->first();
            if($encoder != null){
                if($encoder->status == 0) {
                    $status = 'encoder: processing';
                }elseif ($encoder->status == 19){
                    $status = 'encoder: failed';
                }elseif ($encoder->status == 4){
                    $status = 'encoder: completed';
                } else{
                    $status = 'encoder: processing';
                }
            }
            $videoData[] = [
                "title" => $video->title,
                "folder" => $folderName,
                "video_id" => $video->slug,
                "embedLink" => "https://streamsilk.com/p/".$video->slug,
                "poster" => $video->poster,
                "view" => $video->total_play,
                "size" => $this->convertFileSize($video->size),
                "date_uploaded" => $video->created_at->format('m/d/Y H:i:s'),
                "status" => $status,
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
        $clonedVideo = $this->uploadController->cloneVideo($request);
        if($clonedVideo == null){
            return response()->json([
                "msg" => "No video found",
                "status" => 404,
                "sever_time" => date('Y-m-d H:i:s'),
            ]);
        }
        $fileClone = [];
        foreach ($clonedVideo as $video) {
            $fileClone[] = [
                "title" => $video['title'],
                "folder" => $video['folder'],
                "video_id" => $video['slug'],
                "embedLink" => "https://streamsilk.com/p/".$video['slug'],
            ];
        }
        $data = [
            "msg" => "ok",
            "status" => 200,
            "sever_time" => date('Y-m-d H:i:s'),
            "file_clone" => $fileClone
        ];

        return $data;
    }
    //rename video
    public function updateMultipleTitles(Request $request)
    {
        // Validate the request...
        $data = $request->all();
        $validator = Validator::make($data, [
            'videoIds' => 'required',
            'videoIds.*' => 'exists:videos,id',
            'append' => 'nullable|string',
            'prepend' => 'nullable|string',
            'replace' => 'nullable|string',
            'with' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $ids = $data['videoIds'];
        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }
        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'No video IDs provided'], 400);
        }

        $updatedVideos = [];

        // Update the titles of the videos...
        foreach ($ids as $index => $id) {
            $video = $this->videoRepo->findWhere(['slug' => $id])->first();
            if ($video) {
                $title = $video->title;
                // append
                if (isset($data['append']) && $data['append'] !== '') {
                    $title = $data['append'] . $title;
                }
                // Prepend
                if (isset($data['prepend']) && $data['prepend'] !== '') {
                    $title = $title . $data['prepend'];
                }

                // Replace
                if (isset($data['replace']) && $data['replace'] !== '') {
                    $title = str_replace($data['replace'], $data['with'] ?? '', $title);
                }
                $video->title = $title;
                $video->save();
                $updatedVideos[] = [
                    'id' => $video->id,
                    'newTitle' => $title
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
        $video = $this->videoRepo->findVideoBySlug($slug);
        $subtitles = [];
        $jsonUrl = 'https://streamsilk.com/storage/subtitles/'.$slug.'/'.$slug.'.json';
        if($video->is_sub == 1 && @file_get_contents($jsonUrl) !== false ){
            $subtitles = json_decode(file_get_contents($jsonUrl));
            $languageCodes = [ 'eng' => 'English','ton' => 'Tongan', 'spa' => 'Spanish', 'aze' => 'Azerbaijani', 'alb' => 'Albanian', 'ara' => 'Arabic', 'bul' => 'Bulgarian', 'chi' => 'Chinese', 'dnk' => 'Denmark', 'per' => 'Persian', 'fin' => 'Finland', 'fre' => 'French', 'ger' => 'German', 'gre' => 'Greek', 'heb' => 'Hebrew', 'hin' => 'Hindi', 'hun' => 'Hungarian', 'ind' => 'Indonesian', 'ita' => 'Italian', 'jpn' => 'Japanese', 'kan' => 'Kannada', 'khm' => 'Khmer', 'kor' => 'Korean', 'mal' => 'Malayalam', 'may' => 'Malay', 'nor' => 'Norway', 'pol' => 'Polish', 'por' => 'Portuguese', 'rus' => 'Russian', 'sin' => 'Sinhala', 'slv' => 'Slovenian', 'srp' => 'Serbian', 'swe' => 'Sweden', 'tam' => 'Tamil', 'tha' => 'Thai', 'tur' => 'Turkish', 'ukr' => 'Ukrainian', 'vie' => 'Vietnamese', 'rum' => 'Romanian', 'mar' => 'Marathi', 'cze' => 'Czech', 'slo' => 'Slovak', 'lit' => 'Lithuanian', 'kur' => 'Kurdish', 'dan' => 'Danish', 'bos' => 'Bosnian', 'hrv' => 'Croatian' ];
            foreach ($subtitles as $subtitle) {
                if(isset($languageCodes[$subtitle->label])){
                    $subtitle->label = $languageCodes[$subtitle->label].' ('.$subtitle->label . ')';
                }
            }
        }
        $data = [
            'title' => 'Setting Video',
            'video' => $video,
            'subtitles' => $subtitles,
        ];
        return view('dashboard.video.settingVideo', $data);
    }
    public function getLinkPlay($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        $video = $video->check_duplicate == 0 ? $this->videoRepo->findVideoBySlug($video->middle_slug) : $video;
        if ($video && $video->soft_delete == 0) {
            if(!file_exists('data1/'.$video->middle_slug)) {
                if ($video->stream == 0) {
                    $svStream = SvStreamService::selectSvStream();
                    $nameSvStream = explode('.', $svStream);
                    $video->stream = $nameSvStream[0];
                    if($nameSvStream[0])
                        $video->save();
                } else {
                    $svStream = SvStreamService::checkConnectSvStream(explode('-', $video->stream));
                    if ($svStream === null) {
                        $svStream = SvStreamService::selectSvStream();
                        $nameSvStream = explode('.', $svStream);
                        $video->stream = $video->stream . '-' . $nameSvStream[0];
                        if($nameSvStream[0])
                            $video->save();
                    }
                }
                $urlPlay = 'https://' . $svStream . '/data/' . explode('-', $video->pathStream)[1] . '/' . $video->middle_slug . '/master.m3u8';
            }
            else
                $urlPlay = 'https://streamsilk.com/data/'.$video->middle_slug.'/'.$video->middle_slug.'.m3u8';
            $data = [
                'title' => 'Setting Video',
                'video' => $video,
                'urlPlay' => $urlPlay,
            ];
            return view('dashboard.video.settingVideo', $data);
        }
        return view('dashboard.video.settingVideo', $data);
    }
}
