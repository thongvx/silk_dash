<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\VideoController;

class ModelHelpers
{
    protected $videoController;

    public function __construct(VideoController $videoController)
    {
        $this->videoController = $videoController;
    }
    public static function genVideoId(){
        $id = uniqid();

    }
    public function loadPage(Request $request){
        $content = $request->input('content');
        $page = $request->input('page');
        return view($page.'.'.$content);
    }
    public function loadPagevideo(Request $request){
        $content = $request->input('content');
        $page = $request->input('page');
        $data = $this->videoController->getVideoData($request);

        return view($page.'.'.$content, $data);
    }
}
