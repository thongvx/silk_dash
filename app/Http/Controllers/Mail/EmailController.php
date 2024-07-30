<?php

namespace App\Http\Controllers\Mail;

use App\Models\User;
use App\Notifications\DiscountProgramEmail;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function sendDiscountProgramEmails()
    {
        $user = User::find(13) ;
        $discountDetails = 'Gift up to 30% for first withdrawal!'; // Replace with actual discount details
        if ($user) {
            $user->notify(new DiscountProgramEmail($discountDetails));
        }

//        foreach ($users as $user) {
//            $user->notify(new DiscountProgramEmail($discountDetails));
//        }

        return response()->json(['message' => 'Discount program emails sent successfully']);
    }
}
