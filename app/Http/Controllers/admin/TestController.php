<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Http\Request;
use App\Models\EncoderTask;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    //------------------------------------get all video ------------------------------------
    function test1()
    {
        $data['status'] = 0;
        EncoderTask::where('status', 19)->update($data);

    }

    //=========================================================================================================
}
