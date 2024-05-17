<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            'website' => 'nullable|url',
            'skype' => 'max:255',
            'telegram' => 'max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $user = Auth::user();
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->website = $request->input('website', $user->website);
        $user->skype = $request->input('skype', $user->skype);
        $user->telegram = $request->input('telegram', $user->telegram);
        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
