<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'status',
        'user_ID',
        'user_name',
        'amount',
        'transaction_ID',
        'network',
        'comment',
    ];
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            $model->deleteRedisKeys();
        });

        static::deleted(function ($model) {
            $model->deleteRedisKeys();
        });
    }

    private function deleteRedisKeys()
    {
        $today = Carbon::today();
        Redis::del("user:{$this->user_id}:payment");
        Redis::del("user:{$this->user_id}:total_withdrawal:$today");
    }
}
