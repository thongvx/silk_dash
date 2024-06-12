<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepo;
use App\Repositories\ActivityRepo;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountRepo;
    protected $activityRepo;

    public function __construct(AccountRepo $accountRepo, ActivityRepo $activityRepo)
    {
        $this->accountRepo = $accountRepo;
        $this->activityRepo = $activityRepo;
    }
    public function index($tab)
    {
        $user = Auth::user();
        $userid = $user->id;
        $setting = $this->accountRepo->getSetting($userid);
        $activities = $this->activityRepo->getAllActivity($userid);
        switch ($tab) {
            case 'accountsetting':
                return view('dashboard.setting.accountsetting', compact('setting'));
            case 'playersetting':
                return view('dashboard.setting.playersetting', compact('setting'));
            case 'customdomain':
                return view('dashboard.setting.customdomain', compact('setting'));
            case 'customads':
                return view('dashboard.setting.customads', compact('setting'));
            case 'activities':
                return view('dashboard.setting.activities', compact('activities'));
            default:
                return view('dashboard.setting.profile', compact('setting'));
        }
    }

    // Add other methods for other tabs...
}
