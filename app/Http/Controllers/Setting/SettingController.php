<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingController
{
    // Hiển thị danh sách các video của user
    public function index(Request $request)
    {

        $data['title'] = 'Setting';

        return view('setting.index', $data);
    }
// Hàm sort
}
