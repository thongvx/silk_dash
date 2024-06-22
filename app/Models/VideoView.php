<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class VideoView extends Model
{
    use HasFactory;

    protected $table = 'video_views';

    protected $fillable = [
        'video_id',
        'user_id',
        'views',
        'date',
    ];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            Redis::del("user:{$model->user_id}:top_videos:" . Carbon::today()->format('Y-m-d'));
        });

        static::deleted(function ($model) {
            Redis::del("user:{$model->user_id}:top_videos:" . Carbon::today()->format('Y-m-d'));
        });
    }

}
