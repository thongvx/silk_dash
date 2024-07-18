<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepo;
use App\Repositories\ActivityRepo;
use App\Repositories\PlayerSettingsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountRepo, $activityRepo, $playerSettingsRepo;

    public function __construct(AccountRepo $accountRepo, ActivityRepo $activityRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->accountRepo = $accountRepo;
        $this->activityRepo = $activityRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;
        $tab = $request->input('tab');
        if($tab == 'playersetting'){
            $data['playerSettings'] = $this->playerSettingsRepo->getAllPlayerSettings($userid);
        } elseif ($tab == 'activities') {
            $data['activities'] = $this->activityRepo->getAllActivity($userid);
        } else {
            $data['setting'] = $this->accountRepo->getSetting($userid);
        }
        return $data;
    }

    // Add other methods for other tabs...
}
