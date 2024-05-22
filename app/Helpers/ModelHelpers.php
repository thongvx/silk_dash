<?php

namespace App\Helpers;

use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Setting\AccountController;
use App\Http\Controllers\Dashboard\UploadController;
use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelHelpers
{
    protected $videoController;
    protected $AccountController;
    protected $folderRepo;
    protected $uploadController;

    public function __construct(VideoController $videoController, AccountController $AccountController, FolderRepo $folderRepo, UploadController $uploadController)
    {
        $this->videoController = $videoController;
        $this->AccountController = $AccountController;
        $this->folderRepo = $folderRepo;
        $this->uploadController = $uploadController;
    }
    public static function genVideoId(){
        $id = uniqid();

    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');
        $user = Auth::user();
        switch ($page) {
            case 'setting':
                return $this->AccountController->index($tab);
            case 'video':
                $data = $this->videoController->getVideoData($request);
                return view($page.'.'.$tab, $data);
            case 'upload':
                return $this->uploadController->upload($tab);
            default:
                return view($page.'.'.$tab);
        }
    }
}
