<?php

namespace App\Models;


use App\Enums\VideoCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use App\Repositories\FolderRepo;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected static $folderRepo;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if (!self::$folderRepo) {
            self::$folderRepo = app(FolderRepo::class);
        }
    }

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

        static::created(function ($model) {
            self::$folderRepo->updateNumberOfFiles($model->folder_id);
        });

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            Redis::del(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $model->slug);
            if (!$model->isDirty('total_play' && !$model->isDirty('quality'))) {
                $model->deleteCache();
            }
            if ($model->isDirty('folder_id') || $model->isDirty('soft_delete')) {
                self::$folderRepo->updateNumberOfFiles($model->folder_id);
            }
        });

        static::deleted(function ($model) {
            if (!$model->isDirty('total_play')) {
                $model->deleteCache();
            }
            self::$folderRepo->updateNumberOfFiles($model->folder_id);
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
