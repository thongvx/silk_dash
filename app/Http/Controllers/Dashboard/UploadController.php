<?php

namespace App\Http\Controllers\Dashboard;


use App\Repositories\FolderRepo;
use Illuminate\Support\Facades\Auth;
use App\Factories\DownloadFactory;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UploadController
{
    protected  $folderRepo;
    //Trả về giao diện upload
    public function __construct(FolderRepo $folderRepo){
        $this->folderRepo = $folderRepo;
    }
    public function index()
    {
        $user = Auth::user();
        $data=[
            'title' => 'Upload',
            'folders' =>$this->folderRepo->getAllFolders($user->id),
            'currentFolderName' => $this->folderRepo->getAllFolders($user->id)->last(),
            'getProgressTransfer' => $this->getProgressTransfer(),
        ];
        return view('upload.upload', $data);
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
                return view('upload.transfer', $data);
            case 'FTP':
                return view('upload.FTP', $data);
            case 'clone':
                return view('upload.clone', $data);
            default:
                return view('upload.webupload', $data);
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
            $key = 'uploadProgress.'.$url;
            Redis::setex($key, 3600, 'error: '.$e->getMessage());
        }
    }
    public function postTransfer(Request $request)
    {
        $user = Auth::user();
        $transfer_priority = $user->transfer_priority;
        if($transfer_priority)
            $transfer_priority = 0;
        $link = $request->url;
        $folder_id = $request->FolderID;
        $arrLink = explode("\r\n", $link);
        if(count($arrLink) == 1) {
            $arrLink = explode("\n", $link);
        }
        //upload DB
        foreach ($arrLink as $url) {
            // Prepare a new Transfer record for each link
            $records[] = [
                'user_id' => $user->user_id,
                'url' => $url,
                'slug' => uniqid(),
                'title' => '0',
                'priority' => $transfer_priority,
                'status' => '0',
                'sv_transfer' => '0',
                'folder_id' => $folder_id,
                'progress' => '0',
                'size_download' => '0',
                'size' => '0',
            ];
        }
        Transfer::insert($records);
        return true;
    }
    public function getProgress(Request $request)
    {
        $progressKey = 'uploadProgress.'.$request->input('key');
        $progress = Redis::get($progressKey);

        if ($progress === null) {
            return response()->json(['error' => 'Progress not found'], 404);
        }

        return $progress;
    }
    //-------------------------------get progress transfer-----------------------------------------
    public function getProgressTransfer()
    {
        $user = Auth::user();
        $keys = Redis::keys('transfer'.$user->user_id.'-*');
        // Process the retrieved keys
        $data = [];
        foreach ($keys as $key) {
            $key = str_replace('laravel_database_', '', $key);
            $value = Redis::get($key);
            $value = json_decode($value, true);
            $data[$key] = $value;
        }
        return json_encode($data);
    }
}
