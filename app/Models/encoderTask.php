<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class encoderTask extends Model
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

    protected static function boot()
    {
        parent::boot();


    }

}
