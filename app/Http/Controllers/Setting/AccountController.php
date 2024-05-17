<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountRepo;

    public function __construct(AccountRepo $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }
    public function index($tab)
    {
        $user = Auth::user();
        $setting = $this->accountRepo->getAllSetting($user->id);

        switch ($tab) {
            case 'accountsetting':
                return view('setting.accountsetting', compact('setting'));
            case 'playersetting':
                return view('setting.playersetting', compact('setting'));
            case 'customdomain':
                return view('setting.customdomain', compact('setting'));
            case 'customads':
                return view('setting.customads', compact('setting'));
            default:
                return view('setting.profile', compact('setting'));
        }
    }

    // Add other methods for other tabs...
}
