<?php

namespace App\Notifications;

use App\Models\Notification;

class NotificationService
{
    public static function addNotification($userId, $subject, $message, $type)
    {
        $notification = new Notification();
        $notification->user_id = $userId;
        $notification->subject = $subject;
        $notification->message = $message;
        $notification->type = $type;
        $notification->read = false;
        $notification->save();
    }
}
