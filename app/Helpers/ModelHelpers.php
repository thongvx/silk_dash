<?php

namespace App\Helpers;

use App\Http\Controllers\admin\ManagetaskController;
use App\Http\Controllers\Dashboard\Setting\AccountController;
use App\Http\Controllers\Dashboard\Support\TicketController;
use App\Http\Controllers\Dashboard\UploadController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ModelHelpers
{
    protected $videoController;
    protected $AccountController;
    protected $folderRepo;
    protected $uploadController;
    protected $TicketController;

    protected $managetaskController;

    public function __construct(VideoController $videoController, AccountController $AccountController, FolderRepo $folderRepo, UploadController $uploadController, TicketController $TicketController, ManagetaskController $managetaskController)
    {
        $this->videoController = $videoController;
        $this->AccountController = $AccountController;
        $this->folderRepo = $folderRepo;
        $this->uploadController = $uploadController;
        $this->TicketController = $TicketController;

        $this->managetaskController = $managetaskController;
    }
    public static function genVideoId(){
        $id = uniqid();
    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');

        $user = Auth::user();
        if (strpos($page, 'admin') !== false) {
            switch ($page) {
                case 'setting':
                    return $this->AccountController->index($tab);
                case strpos($page, 'manageTask') !== false:
                    $data = $this->managetaskController->manageControler($request);
                    return view($page.'.'.$tab, $data);
                default:
                    return view($page.'.'.$tab);
            }
        }else{
            switch ($page) {
                case 'setting':
                    return $this->AccountController->index($tab);
                case 'video':
                    $data = $this->videoController->getVideoData($request);
                    return view('dashboard.'.$page.'.'.$tab, $data);
                case 'upload':
                    return $this->uploadController->upload($tab);
                case 'support':
                    return $this->TicketController->ticket($tab);
                default:
                    return view('dashboard.'.$page.'.'.$tab);
            }
        }

    }
}
