<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{

    public function index(){
        $data['title'] = 'Dashboard';
        return view('admin.index', $data);
    }
}
