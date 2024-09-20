<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccountSetting;
use App\Models\Folder;
use App\Models\PlayerSetting;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\Bot;
use App\Http\Controllers\Mail\EmailController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    protected $emailController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( EmailController $emailController)
    {
        $this->middleware('auth')->except('logout');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->emailController = $emailController;
    }

    /**
     * Handle a successful email verification request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function verified(Request $request)
    {
        $user = Auth::user();
        $user->active = 1;
        $user->encoder_priority = 3;
        $user->save();
        Bot::send('new user registered email: ' . $user->email);
        DB::transaction(function () use ($request) {
            $user = Auth::user();
            // Create the account setting
            Folder::create([
                'user_id' => $user->id,
                'name_folder' => 'root',
                'number_file' => 0,
                'soft_delete' => 0,
            ]);
            // Create the player setting
            AccountSetting::create([
                'user_id' => $user->id,
                'earningModes' => 2,
                'videoType' => 1,
                'adblock' => 0,
                'showTitle' => 0,
                'logo' => 0,
                'logoLink' => 0,
                'position' => 0,
                'poster' => 0,
                'blockDirect' => 0,
                'domain' => '0',
                'publicVideo' => 0,
                'premiumMode' => 0,
                'captionsMode' => 0,
                'disableDownload' => 0,
                'gridPoster' => 1,
                'embed_page' => 0,
            ]);
            // Create the folder
            PlayerSetting::create([
                'user_id' => $user->id,
                'show_title' => 1,
                'show_logo' => 1,
                'show_poster' => 0,
                'show_download' => 0,
                'show_preview' => 1,
                'enable_caption' => 1,
                'infinite_loop' => 0,
                'disable_adblock' => 0,
                'thumbnail_grid' => 1,
                'premium_color' => '#05ffff',
                'embed_width' => 800,
                'embed_height' => 600,
                'logo_link' => 'https://streamsilk.com/image/logo/name.webp',
                'position' => 'control-bar',
                'poster_link' => 0,
            ]);

        });
        $request = new Request(['user_id' => $user->id]);
        // Send the discount program email
        $this->emailController->sendDiscountProgramEmails($request);
        // Log out the user after verification
        Auth::logout();

        // Redirect to login with a success message
        return redirect($this->redirectTo)->with('status', 'Your email has been verified. Please log in again.');
    }
    //resend
    public function resend(Request $request)
    {
        $user = Auth::user();
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }
        $lastEmailSent = Session::get('last_email_sent');
        if ($lastEmailSent && now()->diffInMinutes($lastEmailSent) < 2) {
            return back()->with([
                'resentMail' => 'Please wait a few minutes before requesting a new email.',
                'resent' => false,
            ]);
        }
        Session::put('last_email_sent', now());
        $user->sendEmailVerificationNotification();
        return back()->with('resent', true);
    }
    /**
     * Log the user out.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
