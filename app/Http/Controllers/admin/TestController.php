<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class TestController extends Controller
{
    //------------------------------------get all video ------------------------------------
    function getAllVideo($user_id)
    {
        $data = Video::where('user_id', $user_id)->where('id', '>', 45326)->select('slug', 'sd', 'hd', 'fhd')->get();
        return response()->json($data);
    }
    //=========================================================================================================
}