<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    function test(){
        $arrStream = 'ss02-ss01';
        $explodeStream = explode('-', $arrStream);
        $selectStream = 0;
        foreach ($explodeStream as $svStream){
            $svStream = 'sv_streams:' . $svStream;
            $svStreamInfo = Redis::hgetall($svStream);
            if($svStreamInfo){
                if ($svStreamInfo['out_speed'] < 900 && $svStreamInfo['active'] == 1) {
                    $selectStream = $svStreamInfo['domain'];
                }
            }

        }
        echo 123;
    }
}
