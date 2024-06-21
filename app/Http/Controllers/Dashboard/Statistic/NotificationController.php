<?php

namespace App\Http\Controllers\Dashboard\Statistic;

use App\Repositories\NotificationRepo;
use Illuminate\Support\Facades\Auth;

class NotificationController
{
    protected $notificationRepo;

    public function __construct(NotificationRepo $notificationRepo)
    {
        $this->notificationRepo = $notificationRepo;
    }

    public function readAll()
    {
        $user = Auth::user();
        $notifications = $this->notificationRepo->getAllNotifications($user->id);
        foreach ($notifications as $notification) {
            $notification->read = true;
            $notification->save();
        }
        return response()->json(['success' => true]);
    }

    public function deleteAll()
    {
        $user = Auth::user();
        $this->notificationRepo->deleteAllNotifications($user->id);
        return response()->json(['success' => true]);
    }

    public function read($id)
    {
        $notification = $this->notificationRepo->find($id);
        if ($notification) {
            $notification->read = true;
            $notification->save();
        }
        return response()->json(['success' => true]);
    }
}
