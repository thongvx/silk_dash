<?php

namespace App\Models;

use App\Enums\NotificationCacheKeys;
use App\Enums\VideoCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'type',
        'read',
    ];
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            Redis::del(NotificationCacheKeys::GET_ALl_NOTIFICATION_BY_USER_ID->value . $model->user_id);

        });

        static::deleted(function ($model) {
            Redis::del(NotificationCacheKeys::GET_ALl_NOTIFICATION_BY_USER_ID->value . $model->user_id);
        });
    }
}

