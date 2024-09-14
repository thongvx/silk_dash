<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EncoderTask;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    //------------------------------------get all video ------------------------------------
    function test1()
    {
        $arrStream = 'sv_streams:ss03';

                $svStream = Redis::hgetall($arrStream);
        if ($svStream['out_speed'] < 900 && $svStream['active'] == 1) {
            return $svStream['domain'];
        }
        else
            return 'no';

    }

    //=========================================================================================================
}
