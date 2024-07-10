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

}
