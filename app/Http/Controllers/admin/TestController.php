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
        Redis::sadd('sv_streams', 'sv_streams:ss01');
        Redis::sadd('sv_streams', 'sv_streams:ss02');
        Redis::sadd('sv_streams', 'sv_streams:ss03');
        Redis::sadd('sv_streams', 'sv_streams:ss04');
        Redis::sadd('sv_streams', 'sv_streams:ss05');
        Redis::sadd('sv_streams', 'sv_streams:ss06');
        Redis::sadd('sv_streams', 'sv_streams:ss07');
        Redis::sadd('sv_streams', 'sv_streams:ss08');
        Redis::sadd('sv_streams', 'sv_streams:ss09');
        Redis::sadd('sv_streams', 'sv_streams:ss10');
        Redis::sadd('sv_streams', 'sv_streams:ss11');
        Redis::sadd('sv_streams', 'sv_streams:ss12');
    }

    //=========================================================================================================
}
