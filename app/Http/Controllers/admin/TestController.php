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
        $svStreamKeys = Redis::smembers('sv_streams');
        shuffle($svStreamKeys);
        foreach ($svStreamKeys as $svStreamKey) {
            $svStream = Redis::hgetall($svStreamKey);
            if ($svStream['active'] == 1 && $svStream['out_speed'] < 900 && $svStream['cpu'] < 10 && $svStream['percent_space'] < 0.95) {
                return $svStream['domain'];
            }
        }
        return null;
    }

    //=========================================================================================================
}
