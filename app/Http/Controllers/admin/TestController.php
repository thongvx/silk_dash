<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EncoderTask;

class TestController extends Controller
{
    //------------------------------------get all video ------------------------------------
    function getAllVideo($user_id)
    {
        $dataUpdate['status'] = 0;
        $data = EncoderTask::where('status', 3)->update($dataUpdate);
        echo 'ok';
    }
    //=========================================================================================================
}
