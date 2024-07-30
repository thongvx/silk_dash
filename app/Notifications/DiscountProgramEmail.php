<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DiscountProgramEmail extends Notification
{
    use Queueable;

    protected $discountDetails;
    protected $subcopy;

    public function __construct($discountDetails, $subcopy = null)
    {
        $this->discountDetails = $discountDetails;
        $this->subcopy = $subcopy;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Gift up to 30% for first withdrawal!')
            ->markdown('emails.gift', [
                'discountDetails' => $this->discountDetails,
                'subcopy' => $this->subcopy,
            ]);
    }
}
