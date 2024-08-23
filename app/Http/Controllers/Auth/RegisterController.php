<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PlayerSetting;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\AccountSetting;
use App\Models\Folder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

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
            'website' => ['required', 'string', 'max:255'],
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
         Session::put('last_email_sent', now());
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->website = $data['website'];
        $user->telegram = $data['telegram'] ?? null;
        $user->skype = $data['skype'] ?? null;
        $user->key_api = bin2hex(random_bytes(8));
        $user->max_transfer = 10;
        $user->max_torrent = 10;
        $user->encoder_priority = 0;
        $user->transfer_priority = 0;
        $user->torrent_priority = 0;
        $user->stream_priority = 0;
        $user->storage = 0;
        $user->video = 0;
        $user->play = 0;
        $user->last_upload = 0;
        $user->earning = 0;
        $user->premium = 0;
        $user->active = 0;
        $user->save();



//       event(new Registered($user));
        return $user;
    }
}
