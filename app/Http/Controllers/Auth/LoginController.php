<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (auth()->user()->hasRole('admin')) {
            return route('adminHome');
        }

        return route('dashboard');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // User is authenticated, now we can record the activity
            $this->recordActivity();

            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    protected function recordActivity()
    {
        $user = Auth::user();
        $ip = request()->ip();
        $time = now();

        // You can use a service like https://ipstack.com/ to get the location based on the IP address
        $location = $this->getLocation($ip);

        Activity::create([
            'user_id' => $user->id,
            'ip_address' => $ip,
            'login_time' => $time,
            'location' => $location,
        ]);
    }
    protected function getLocation($ip)
    {
        $client = new Client();

        $response = $client->get("http://ip-api.com/json/{$ip}");

        $locationData = json_decode($response->getBody());

        // You can customize this based on the data you need
        $location = $locationData->city . ', ' . $locationData->regionName . ', ' . $locationData->country;

        return $location;
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
