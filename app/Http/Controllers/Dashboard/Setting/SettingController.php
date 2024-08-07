<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Repositories\ActivityRepo;
use App\Repositories\AccountRepo;
use App\Repositories\PlayerSettingsRepo;
use App\Repositories\CustomAdsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SettingController
{
    private $accountRepo, $activityRepo, $playerSettingsRepo, $customAdsRepo;
    public function __construct(AccountRepo $accountRepo, ActivityRepo $activityRepo,
                                PlayerSettingsRepo $playerSettingsRepo, CustomAdsRepo $customAdsRepo)
    {
        $this->accountRepo = $accountRepo;
        $this->activityRepo = $activityRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
        $this->customAdsRepo = $customAdsRepo;
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $data=[
            'title' => 'Setting',
            'setting' => $this->accountRepo->getSetting($user->id),
            'activities' => $this->activityRepo->getAllActivity($user->id),
            'playerSettings' => $this->playerSettingsRepo->getAllPlayerSettings($user->id),
            'AllCustomAds' => $this->customAdsRepo->getCustomAds($user->id),
        ];
        return view('dashboard.setting.index', $data);
    }
    public function show()
    {
        $user = Auth::user();
        $setting = $this->accountRepo->getSetting($user->id);
        return response()->json($setting);
    }

    // Update setting
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'domain' => 'nullable|max:255',
            'logo' => 'nullable|file|max:2048',
            'poster' => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = Auth::user();
        $setting = $this->accountRepo->getSetting($user->id);
        if ($setting) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('logo', $filename, 'public');
                $data['logo'] = $path;
            }
            if ($request->hasFile('poster')) {
                $file = $request->file('poster');
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('poster', $filename, 'public');
                $data['poster'] = $path;
            }

            $setting->update($data);
        }
        return response()->json(['message' => $data], 200);
    }
}
