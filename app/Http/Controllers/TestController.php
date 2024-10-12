<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    function test(){
        $arrStream = 'ss02-ss01';
        $explodeStream = explode('-', $arrStream);
        foreach ($explodeStream as $svStream){
            $svStream = 'sv_streams:' . $svStream;
            $svStreamInfo = Redis::hgetall($svStream);
            if($svStreamInfo){
                if ($svStreamInfo['out_speed'] < 900 && $svStreamInfo['active'] == 1) {
                    return $svStreamInfo['domain'];
                }
            }
            else
            {
                return null;
            }
        }

    }
}
