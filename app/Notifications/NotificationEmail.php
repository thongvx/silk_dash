<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationEmail extends Notification
{
    use Queueable;

    protected $notificationDetails;
    protected $subcopy;

    public function __construct($notificationDetails, $subcopy = null)
    {
        $this->notificationDetails = $notificationDetails;
        $this->subcopy = $subcopy;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Please use newest Z-o-o-m version to upload videos !')
            ->markdown('emails.notification', [
                'notificationDetails' => $this->notificationDetails,
                'subcopy' => $this->subcopy,
            ]);
    }
}
