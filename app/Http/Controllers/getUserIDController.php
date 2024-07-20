<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class getUserIDController extends Controller
{
    public function getUserID($keyAPI)
    {
        if(redis::get('getUserID'.$keyAPI)){
            return redis::get('getUserID'.$keyAPI);
        }
        $user = User::where('token', $keyAPI)->first();
        if ($user) {
            $folderID = Folder::where('user_id', $user->id)->where('name_folder', 'root')->first();
            $data['user_id'] = $user->id;
            $data['folder_id'] = $folderID->id;
            redis::set('getUserID'.$keyAPI, json_encode($data));
            return json_encode($data);
        }

    }
}
