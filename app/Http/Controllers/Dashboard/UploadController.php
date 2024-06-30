<?php

namespace App\Http\Controllers\Dashboard;


use App\Repositories\FolderRepo;
use Illuminate\Support\Facades\Auth;
use App\Factories\DownloadFactory;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Repositories\VideoRepo;
use App\Repositories\AccountRepo;

class UploadController
{
    protected $folderRepo;
    protected $videoRepo;
    protected $accountRepo;

    //Trả về giao diện upload
    public function __construct(FolderRepo $folderRepo, VideoRepo $videoRepo, AccountRepo $accountRepo)
    {
        $this->folderRepo = $folderRepo;
        $this->videoRepo = $videoRepo;
        $this->accountRepo = $accountRepo;
    }

    public function index()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Upload',
            'folders' => $this->folderRepo->getAllFolders($user->id),
            'currentFolderName' => $this->folderRepo->getAllFolders($user->id)->last(),
            'getProgressTransfer' => $this->getProgressTransfer(),
        ];
        return view('dashboard.upload.upload', $data);
    }

    public function upload($tab)
    {
        $user = Auth::user();
        $data['title'] = 'Upload';
        $data['folders'] = $this->folderRepo->getAllFolders($user->id);
        $data['currentFolderName'] = $data['folders']->last();
        switch ($tab) {
            case 'transfer':
                $data['getProgressTransfer'] = $this->getProgressTransfer();
                return view('dashboard.upload.transfer', $data);
            case 'FTP':
                return view('dashboard.upload.FTP', $data);
            case 'clone':
                return view('dashboard.upload.clone', $data);
            default:
                return view('dashboard.upload.webupload', $data);
        }

    }

    public function remoteUploadDirect(Request $request)
    {
        $url = $request->input('url');
        $this->remoteUpload($url);
    }

    //Cho phép người dùng upload từ url
    public function remoteUpload($url)
    {
        try {
            $download = DownloadFactory::create($url);
            $download->download();

        } catch (\Exception $e) {
            $key = 'uploadProgress.' . $url;
            Redis::setex($key, 3600, 'error: ' . $e->getMessage());
        }
    }

    public function postTransfer(Request $request)
    {
        $user = Auth::user();
        $transfer_priority = $user->transfer_priority;
        if ($transfer_priority)
            $transfer_priority = 0;
        $link = $request->url;
        if($request->has('FolderID')) {
            $folder_id = $request->FolderID;
            $folderName = $this->folderRepo->find($folder_id)->name_folder;
        } else {
            $folderName = $request->get('nameFolder', 'root');
            $folder_id = $this->folderRepo->getFolder($folderName)->id;
        }
        $arrLink = explode("\r\n", $link);
        if (count($arrLink) == 1) {
            $arrLink = explode("\n", $link);
        }
        //upload DB
        foreach ($arrLink as $url) {
            // Prepare a new Transfer record for each link
            $slug = uniqid();
            $records[] = [
                'user_id' => $user->id,
                'url' => $url,
                'slug' => $slug,
                'title' => '0',
                'priority' => $transfer_priority,
                'status' => '0',
                'sv_transfer' => '0',
                'folder_id' => $folder_id,
                'progress' => '0',
                'size_download' => '0',
                'size' => '0',
            ];
            Redis::setex('transfer'.$user->id.'-'.$slug, 1800, json_encode([
                'slug' => $slug,
                'url' => $url,
                'status' => 0,
                'progress' => 0,
                'size_download' => 0,
                'size' => 0,
            ]));
        }
        Transfer::upsert($records, ['user_id', 'url'], []);
        $videoID = [];
        foreach ($records as $record) {
            $videoID[] = $record['slug'];
        }
        $data = [
            "msg" => "ok",
            "status" => 200,
            "sever_time" => date('Y-m-d H:i:s'),
            "total_upload" => count($arrLink),
            "result" => [
                "Name Folder" => $folderName,
                "videoID" => $videoID,
            ],
        ];
        return response()->json($data);
    }
    public function cloneVideo(Request $request)
    {
        $user = Auth::user();
        $transfer_priority = $user->transfer_priority;
        if ($transfer_priority)
            $transfer_priority = 0;
        $link = $request->url;
        if($request->has('FolderID')) {
            $folder_id = $request->FolderID;
        } else {
            $folderName = $request->get('nameFolder', 'root');
            $folder_id = $this->folderRepo->getFolder($folderName)->id;
        }
        $arrLink = explode("\r\n", $link);
        if (count($arrLink) == 1) {
            $arrLink = explode("\n", $link);
        }
        $result = [];
        foreach ($arrLink as $url){
            $checkUrl = strpos($url, 'https://');
            if($checkUrl == 0){
                $slugClone = basename($url);
            }
            else
                $slugClone = $url;
            //info video
            $video = $this->videoRepo->findVideoBySlug($slugClone);
            if($video){
                //check user public video
                $data_setting = $this->accountRepo->getSetting($video->user_id);
                if($data_setting->publicVideo == 1){
                    $newVideo = $video->replicate();
                    $newVideo->slug = uniqid();
                    $newVideo->title = $video->title.'-clone';
                    $newVideo->folder_id = $folder_id;
                    $newVideo->pathStream = '0';
                    $newVideo->is_sub = 0;
                    $newVideo->total_play = 0;
                    $newVideo->origin = 1;
                    $newVideo->soft_delete = 0;
                    $newVideo->stream = 0;
                    $newVideo->sd = '0';
                    $newVideo->hd = '0';
                    $newVideo->fhd = '0';
                    $newVideo->check_duplicate = 0;
                    // Lưu video mới
                    $newVideo->save();
                    $result[] = [
                        'slug' => $newVideo->slug,
                        'title' => $newVideo->title,
                        'size' => self::convertFileSize($newVideo->size),
                    ];
                }
            }
        }
        return $result;
    }
    //-------------------------------get progress transfer-----------------------------------------
    public function getProgressTransfer()
    {
        $user = Auth::user();
        $keys = Redis::keys('transfer' . $user->user_id . '-*');

        $data = array_map(function ($key) {
            return json_decode(Redis::get($key), true);
        }, $keys);

        return json_encode($data);
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
