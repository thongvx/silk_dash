<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\DiscountProgramEmail;
use App\Notifications\NotificationEmail;
use Illuminate\Http\Request;


class EmailController extends Controller
{
    public function sendDiscountProgramEmails(Request $request)
    {
        $discountDetails = 'Gift up to 30% for first withdrawal!'; // Replace with actual discount details
        $userId = $request->input('user_id');

        if ($userId === 'all') {
            $users = User::whereNotNull('email_verified_at')
                ->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'admin');
                })
                ->get();
            foreach ($users as $user) {
                $user->notify(new DiscountProgramEmail($discountDetails));
            }
        } else {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new DiscountProgramEmail($discountDetails));
            } else{
                return response()->json(['message' => 'User not found'], 404);
            }
        }

        return response()->json(['message' => 'Discount program emails sent successfully']);
    }
    //send NotificationEmail
    public function sendNotificationEmails(Request $request)
    {
        $notificationDetails = 'Exciting Partnership with Zoom!'; // Replace with actual zoom details
        $userId = $request->input('user_id');

        if ($userId === 'all') {
            $users = User::whereNotNull('email_verified_at')
                ->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'admin');
                })
                ->get();
            foreach ($users as $user) {
                $user->notify(new NotificationEmail($notificationDetails));
            }
        } else {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new NotificationEmail($notificationDetails));
            } else{
                return response()->json(['message' => 'User not found'], 404);
            }
        }

        return response()->json(['message' => 'Notification emails sent successfully']);
    }
    public function viewDiscountProgramEmails()
    {
        return view('emails.gift');
    }
}
