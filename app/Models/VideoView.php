<?php

namespace App\Models;

use App\Enums\VideoCacheKeys;
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
            if ($model->isDirty('views')) {
                $model->deleteCacheViews();
            }
        });

        static::deleted(function ($model) {
            if (!$model->isDirty('views')) {
                $model->deleteCacheViews();
            }

        });
    }

    public function deleteCacheViews()
    {
        $userId = auth()->id();
        $date = Carbon::today()->format('Y-m-d');
        $keys = Redis::keys("user:{$userId}:top_videos:{$date}");
        if (!empty($keys)) {
            Redis::del($keys);
        }
    }
}
