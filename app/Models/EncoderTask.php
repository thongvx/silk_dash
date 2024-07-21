<?php

namespace App\Models;


use App\Enums\VideoCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class EncoderTask extends Model
{
    use HasFactory;

    protected $table = 'encoder_task';

    protected $fillable = [
        'user_id',
        'slug',
        'status',
        'priority',
        'quality',
        'size',
        'format',
        'sv_encoder',
        'sv_upload',
        'sv_storage',
        'start_encoder',
        'finish_encoder',
    ];
    public function insertEncoderTask(array $videoData = [], $priority = 0, $quality){

        $this->user_id = $videoData['user_id'];
        $this->priority = $priority;
        $this->slug = $videoData['slug'];
        $this->quality = $quality;
        $this->status = 0;
        $this->size = $videoData['size'];
        $this->format = $videoData['format'];
        $this->sv_encoder = 0;
        $this->sv_upload = $videoData['sv_upload'];
        $this->sv_storage = 0;
        $this->start_encoder = null;
        $this->finish_encoder = null;
    }
    protected static function boot()
    {
        parent::boot();
        static::created(function ($encoderTask) {
            Redis::del(Redis::keys(VideoCacheKeys::ALL_ENCODER_TASKS->value . $encoderTask->user_id . '*'));
        });
        static::updated(function ($encoderTask) {
            Redis::del(Redis::keys(VideoCacheKeys::ALL_ENCODER_TASKS->value . $encoderTask->user_id . '*'));
        });
        static::deleted(function ($encoderTask) {
            Redis::del(Redis::keys(VideoCacheKeys::ALL_ENCODER_TASKS->value . $encoderTask->user_id . '*'));
        });
    }

}
