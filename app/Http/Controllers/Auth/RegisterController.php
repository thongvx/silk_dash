<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\AccountSetting;
use App\Models\Folder;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'key_api' => bin2hex(random_bytes(8)),
             'max_transfer' => 10,
             'max_torrent' => 10,
             'encoder_priority' => 0,
             'transfer_priority' => 0,
             'torrent_priority' => 0,
             'stream_priority' => 0,
             'earning' => 0,
             'premium'  => 0,
             'active' => 0,
        ]);
        $user->user_id = $user->id;
        $user->save();

        Folder::create([
            'user_id' => $user->id,
            'name_folder' => 'root',
            'number_file' => 0,
            'soft_delete' => 0,
        ]);
        AccountSetting::create([
            'user_id' => $user->id,
            'earningModes' => 0,
            'videoType' => 1,
            'adblock' => 0,
            'showTitle' => 0,
            'logo' => 0,
            'logoLink' => 0,
            'position' => 0,
            'poster' => 0,
            'blockDirect' => 0,
            'domain' => 0,
            'publicVideo' => 0,
            'premiumMode' => 0,
            'captionsMode' => 0,
            'disableDownload' => 0,
            'gridPoster' => 1,
        ]);
        return $user;
    }
}
