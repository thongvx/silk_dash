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

    public function regenerateToken(Request $request)
    {
        $user = $request->user();

        // Xóa tất cả token hiện tại của người dùng
        $user->tokens()->delete();

        // Tạo một token mới
        $newToken = $user->createToken('api-token', ['*'])->plainTextToken;

        return response()->json(['token' => $newToken]);
    }

    public function getUserInfo(Request $request)
    {
        $user = Auth::user();
        if ($request->wantsJson()) {
            // Nếu là API, trả về dữ liệu dạng JSON
            return response()->json($user);
        } else {
            // Nếu không phải API, trả về view
            return $user->name;
        }
    }
}
