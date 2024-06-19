<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoView extends Model
{
    use HasFactory;

    protected $table = 'video_views';

    protected $fillable = [
        'video_id',
        'user_id',
        'country',
        'views',
        'date',
    ];
}
