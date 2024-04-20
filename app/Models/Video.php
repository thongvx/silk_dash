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
        'soft_delete',
    ];

    protected static function boot()
    {
        parent::boot();


    }

}
