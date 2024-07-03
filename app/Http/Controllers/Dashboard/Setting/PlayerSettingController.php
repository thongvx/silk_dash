<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Repositories\PlayerSettingsRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PlayerSettingController
{
    private $playerSettingsRepo;
    public function __construct(PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->playerSettingsRepo = $playerSettingsRepo;
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        $data=[
            'title' => 'Player Setting',
            'playerSettings' => $this->playerSettingsRepo->getAllPlayerSettings($user->id),
        ];
        return view('dashboard.setting.index', $data);
    }
    public function show()
    {
        $user = Auth::user();
        $playerSettings = $this->playerSettingsRepo->getAllPlayerSettings($user->id);
        return response()->json($playerSettings);
    }

    // Update setting
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'logo' => 'nullable|file|max:2048',
            'poster' => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = Auth::user();
        $playerSetting = $this->playerSettingsRepo->getAllPlayerSettings($user->id);
        if ($playerSetting) {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('logo/'.$user->id, $filename, 'public');
                $data['logo_link'] = $path;
            }
            if ($request->hasFile('poster')) {
                $file = $request->file('poster');
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('poster/'.$user->id, $filename, 'public');
                $data['poster_link'] = $path;
            }
            $playerSetting->update($data);
            return response()->json(['success' => 'Player setting updated successfully']);
        }

    }
}
