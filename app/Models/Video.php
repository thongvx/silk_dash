<?php

namespace App\Models;


use App\Enums\VideoCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'slug',
        'middle_slug',
        'user_id',
        'folder_id',
        'sd',
        'hd',
        'fhd',
        'title',
        'poster',
        'grid_poster',
        'is_sub',
        'total_play',
        'size',
        'duration',
        'quality',
        'format',
        'check_duplicate',
        'origin',
        'soft_delete',
    ];
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            if (!$model->isDirty('total_play' && !$model->isDirty('quality'))) {
                $model->deleteCache();
            }
        });

        static::deleted(function ($model) {
            if (!$model->isDirty('total_play')) {
                $model->deleteCache();
            }
        });
    }

   public function deleteCache()
    {
       Redis::del(VideoCacheKeys::GET_PLAYER_FOR_VIDEO->value . $this->slug);
        $keys = Redis::keys(VideoCacheKeys::ALL_VIDEO_FOR_USER->value . $this->user_id . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }

}
