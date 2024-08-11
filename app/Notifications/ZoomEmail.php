<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ZoomEmail extends Notification
{
    use Queueable;

    protected $zoomDetails;
    protected $subcopy;

    public function __construct($zoomDetails, $subcopy = null)
    {
        $this->zoomDetails = $zoomDetails;
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
            ->markdown('emails.zoom', [
                'notificationDetails' => $this->zoomDetails,
                'subcopy' => $this->subcopy,
            ]);
    }
}
