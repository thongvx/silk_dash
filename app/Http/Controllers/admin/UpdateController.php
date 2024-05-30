<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\video;

class UpdateController extends Controller
{
    //-------------------------------update poster-------------------------------------------------
    function updatePoster(Request $request)
    {
        $slug = $request->slug;
        $poster = $request->poster;
        $poster_3 = $request->poster_3;
        $poster_5 = $request->poster_5;
        $poster_3 = base64_decode($poster_3);
        $poster_5 = base64_decode($poster_5);
        //update poster
        $video = video::where('slug', $slug)->first();
        if($video){
            $video->poster = $poster;
            $video->grid_poster_3 = $poster_3;
            $video->grid_poster_5 = $poster_5;
            $video->save();
            return response()->json(['status' => 'success']);
        }
    }
    //=============================================================================================
}
