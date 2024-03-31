<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard(){
        $data['title'] = 'Dashboard';
        return view('dashboard.index', $data);
    }
}
