<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Validator;


class SettingController
{
    private $accountRepo;
    public function __construct(AccountRepo $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }
    public function index(Request $request)
    {
        $user = Auth::user();

        $data=[
            'title' => 'setting',
            'setting' => $this->accountRepo->getAllSetting($user->id),
        ];
        return view('setting.index', $data);
    }
    public function show()
    {
        $user = Auth::user();
        $setting = $this->accountRepo->getAllSetting($user->id);
        return response()->json($setting);
    }

    // Update setting
    public function update($userid ,Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'domain' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $setting = $this->accountRepo->getAllSetting($userid);
        if ($setting) {
            $setting->update($data);
        }
        return response()->json(['message' => 'setting update successfully']);
    }
}
