<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\NotificationRepo;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\Statistic\StatisticController;
class HomeController extends Controller
{
    protected $notificationRepo, $statisticController;

    public function __construct(NotificationRepo $notificationRepo, StatisticController $statisticController)
    {
        $this->notificationRepo = $notificationRepo;
        $this->statisticController = $statisticController;
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $user = Auth::user();
        $data['notifications'] = $this->notificationRepo->getAllNotifications($user->id);
        $data['topVideos'] = $this->statisticController->topVideo();
        $data['topCountries'] = $this->statisticController->topCountry();
        $viewDates = $this->statisticController->viewDate();

        $data['dates'] = [
            'day' => $viewDates['today'],
            'week' => collect($viewDates['7days'])->values(),
            'month' => collect($viewDates['30days'])->values(),
        ];
        return view('dashboard.index', $data);
    }
}
