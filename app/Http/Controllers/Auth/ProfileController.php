<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url',
            'skype' => 'max:255',
            'telegram' => 'max:255',
            'usdt_address'=> 'max:255',
            'network'=> 'max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $user = Auth::user();
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->website = $request->input('website', $user->website);
        $user->skype = $request->input('skype', $user->skype);
        $user->telegram = $request->input('telegram', $user->telegram);
        $user->usdt_address = $request->input('usdt_address', $user->usdt_address);
        $user->network = $request->input('network', $user->network);
        $user->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

    public function changePassword(Request $request)
    {
        $data = $request->all();
        // Validate the request data
        Validator::make($data,[
            'current-password' => ['required', new MatchOldPassword],
            'new-password' => ['required', 'string', 'min:8'],
            'new-password_confirmation' => ['required', 'same:new-password'],
        ])->validate();

        // Change the password
        $user = Auth::user();
        $user->password = Hash::make($data['new-password']);
        $user->save();

        // Return a success message
        return response()->json(['message' => 'Password changed successfully']);
    }

    public function changeEmail(Request $request)
    {
        $data = $request->all();
        // Validate the request data
        Validator::make($data,[
            'password-email' => ['required', new MatchOldPassword],
            'new_email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'new_email_confirmation' => ['required', 'same:new_email'],
        ])->validate();

        // Change the email
        $user = Auth::user();
        $user->email = $data['new_email'];
        $user->save();

        // Return a success message
        return response()->json(['message' => 'Email changed successfully']);
    }

    public function regenerateToken(Request $request)
    {
        $user = Auth::user();

        // Xóa tất cả token hiện tại của người dùng
        $user->tokens()->delete();

        // Tạo một token mới
        $newToken = $user->createToken('api-token', ['*'])->plainTextToken;
        $user->key_api = $newToken;
        $user->save();

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
