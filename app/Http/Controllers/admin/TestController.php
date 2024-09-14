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
        $arrStream = 'ss03';
        $svStreamKeys = Redis::smembers('sv_streams');

        foreach ($svStreamKeys as $svStreamKey) {
            $svStreamName = str_replace('sv_streams:', '', $svStreamKey);

            if (in_array($svStreamName, $arrStream)) {
                $svStream = Redis::hgetall($svStreamKey);

                if ($svStream['out_speed'] < 900 && $svStream['active'] == 1) {
                    return $svStream['domain'];
                }
            }
            return 'no';
        }
    }

    //=========================================================================================================
}
