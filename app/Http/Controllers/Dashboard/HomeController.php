<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\Statistic\StatisticController;
use App\Repositories\NotificationRepo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $notificationRepo, $statisticController;

    public function __construct(NotificationRepo $notificationRepo, StatisticController $statisticController)
    {
        $this->notificationRepo = $notificationRepo;
        $this->statisticController = $statisticController;
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        $data['topVideos'] = $this->statisticController->topVideo();
        $data['topCountries'] = $this->statisticController->topCountry();
        $viewDates = $this->statisticController->viewDate();


        // Lấy số lượt xem của ngày hôm nay, 7 ngày và 30 ngày
        $data['dates'] = [
            'day' => implode(',', $this->statisticController->viewHour()),
            'week' => implode(',', array_slice($viewDates, 0, 7)),
            'month' => implode(',', array_slice($viewDates, 0, 30)),
        ];
        return view('dashboard.index', $data);
    }
}
