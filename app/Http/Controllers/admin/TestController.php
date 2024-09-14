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
        $arrStream = 'ss03-ss01';
        $arrStream = explode('-', $arrStream);
        foreach ($arrStream as $valueStream){
            $svStream = Redis::hgetall('sv_streams:'.$valueStream);
            if ($svStream['out_speed'] < 900 && $svStream['active'] == 1) {
                return $svStream['domain'];
            }

        }
        return 'no';

    }

    //=========================================================================================================
}
