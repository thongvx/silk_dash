<?php

namespace App\Helpers;

use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Setting\AccountController;
use Illuminate\Http\Request;

class ModelHelpers
{
    protected $videoController;
    protected $AccountController;

    public function __construct(VideoController $videoController, AccountController $AccountController)
    {
        $this->videoController = $videoController;
        $this->AccountController = $AccountController;
    }
    public static function genVideoId(){
        $id = uniqid();

    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');
        switch ($page) {
            case 'setting':
                return $this->AccountController->index($tab);
            case 'video':
                $data = $this->videoController->getVideoData($request);
                return view($page.'.'.$tab, $data);
            default:
                return view($page.'.'.$tab);
        }
    }
}
