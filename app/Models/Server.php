<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{


    protected $table = 'servers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'video_id',
        'status',
        'priority',
        'quality',
        'size',
        'sv_encoder',
        'sv_upload',
        'start_encoder',
        'finish_encoder',
        'sv_storage',
        'retry',
        'failure',
    ];


}
