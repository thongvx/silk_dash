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
    public function update(Request $request)
    {
        $data = $request->all();
        error_log(print_r($request ->all(), true));
        $validator = Validator::make($data, [
            'domain' => 'nullable|max:255',
            'logo' => 'nullable|file|max:2048',
            'poster' => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = Auth::user();
        $setting = $this->accountRepo->getAllSetting($user->id);
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
