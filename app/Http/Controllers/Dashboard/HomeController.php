<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $notificationRepo;

    public function __construct(NotificationRepo $notificationRepo)
    {
        $this->notificationRepo = $notificationRepo;
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        return view('dashboard.index', $data);
    }
}
