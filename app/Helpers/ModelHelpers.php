<?php

namespace App\Helpers;

use App\Http\Controllers\Dashboard\VideoController;
use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelHelpers
{
    protected $videoController;
    protected $folderRepo;

    public function __construct(VideoController $videoController,  FolderRepo $folderRepo)
    {
        $this->videoController = $videoController;
        $this->folderRepo = $folderRepo;
    }
    public static function genVideoId(){
        $id = uniqid();

    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');
        $user = Auth::user();
        switch ($page) {
            case 'video':
                $data = $this->videoController->getVideoData($request);
                return view($page.'.'.$tab, $data);
            case 'upload':
                $currentFolderName = $this->folderRepo->getAllFolders($user->id)->last();
                return view($page.'.'.$tab, compact('currentFolderName'));
            default:
                return view($page.'.'.$tab);
        }
    }
}
