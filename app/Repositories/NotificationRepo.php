<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Enums\NotificationCacheKeys;
use Illuminate\Support\Facades\Redis;

class NotificationRepo
{
    protected $model;

    public function __construct(Notification $notification)
    {
        $this->model = $notification;
    }

    public function getAllNotifications($userId)
    {
        $notifications = unserialize(Redis::get(NotificationCacheKeys::GET_ALl_NOTIFICATION_BY_USER_ID->value . $userId));
        if (!$notifications) {
            $notifications = $this->model->where('user_id', $userId)->orderBy('id', 'desc')->get();
            Redis::setex(NotificationCacheKeys::GET_ALl_NOTIFICATION_BY_USER_ID->value . $userId, 2592000, serialize($notifications));
        }
        return $notifications;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function deleteAllNotifications($userId)
    {
        return $this->model->where('user_id', $userId)->delete();
    }
    // Add more methods as needed
}
