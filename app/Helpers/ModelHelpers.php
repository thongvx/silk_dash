<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class ModelHelpers
{
    public static function genVideoId(){
        $id = uniqid();

    }
    public function loadPage(Request $request){
        $content = $request->input('content');
        $page = $request->input('page');
        return view($page.'.'.$content);
    }
}
