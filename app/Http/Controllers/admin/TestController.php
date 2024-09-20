<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Http\Request;
use App\Models\EncoderTask;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    //------------------------------------get all video ------------------------------------
    function test1()
    {
        $data = EncoderTask::where('status', 0)->pluck('slug');
        foreach ($data as $slug){
            Redis::set('encoserTask:'.$slug, 1);
        }
    }

    //=========================================================================================================
}
