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
        'pathStream',
        'sd',
        'hd',
        'fhd',
        'title',
        'poster',
        'grid_poster_3',
        'is_sub',
        'total_play',
        'size',
        'duration',
        'quality',
        'format',
        'check_duplicate',
        'origin',
        'soft_delete',
        'stream',
        'grid_poster_5',
    ];
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            if (!$model->isDirty('total_play' && !$model->isDirty('quality'))) {
                $model->deleteCache();
                Redis::del(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $model->slug);
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
        $keys = Redis::keys(VideoCacheKeys::ALL_VIDEO_FOR_USER->value . $this->user_id . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }

}
