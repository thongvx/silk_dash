<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use App\Enums\AccountSettingCacheKeys;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'login_time',
        'location',
    ];
    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->deleteActivity();
        });
        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            $model->deleteActivity();
        });

        static::deleted(function ($model) {
            $model->deleteActivity();

        });
    }

    public function deleteActivity()
    {
        $keys = Redis::keys(AccountSettingCacheKeys::All_Activity_For_User->value . $this->user_id . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }
}
