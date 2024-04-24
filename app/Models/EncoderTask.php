<?php

namespace App\Models;


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
        $this->start_encoder = 0;
        $this->finish_encoder = 0;
    }
    protected static function boot()
    {
        parent::boot();
    }

}
