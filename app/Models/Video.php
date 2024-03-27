<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $fillable = [
        'video_id',
        'user_id',
        'folder',
        'path_stream',
        'sd',
        'hd',
        'fhd',
        'soft_delete',
        'title',
        'poster',
        'grid_poster',
        'is_sub',
        'total_play',
        'last_played',
        'size',
        'duration',
        'quality',
        'format',
    ];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            $userId = $model->getOriginal()['userID'];

            $cacheUserVideoKeys = 'videos:' . $userId . 'get_all*';

            if ($model->isDirty('title')) {
                Redis::del(Redis::keys($cacheUserVideoKeys));
            }
        });
        static::creating(function ($model) {
            $user = Auth::user();
            if ($user) {
                $userId = $user->id;
                $cacheUserVideoKeys = 'videos:' . $userId . 'get_all*';
                Redis::del(Redis::keys($cacheUserVideoKeys));
            }
        });
        static::deleted(function ($model) {
            $userId =$model->getOriginal()['userID'];
            $cacheUserVideoKeys = 'videos:' . $userId . 'get_all*';
            Redis::del(Redis::keys($cacheUserVideoKeys));
        });

    }

}
