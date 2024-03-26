<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class VideoInfo extends Model
{
    use HasFactory;

    protected $table = 'videoInfo';

    protected $fillable = [
        'videoID',
        'title',
        'userID',
        'poster',
        'sub',
        'totalPlay',
        'lastPlayed',
        'dateUpload',
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
            $userId = Auth::user()->id;
            $cacheUserVideoKeys = 'videos:' . $userId . 'get_all*';
            Redis::del(Redis::keys($cacheUserVideoKeys));
        });
        static::deleted(function ($model) {
            $userId =$model->getOriginal()['userID'];
            $cacheUserVideoKeys = 'videos:' . $userId . 'get_all*';
            Redis::del(Redis::keys($cacheUserVideoKeys));
        });

    }

}
