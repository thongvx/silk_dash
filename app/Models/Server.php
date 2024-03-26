<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'servers';

    protected $fillable = [
        'id',
        'userID',
        'videoID',
        'status',
        'priority',
        'quality',
        'size',
        'svEncoder',
        'svUpload',
        'startEncoder',
        'finishEncoder',
        'svStorage',
        'retry',
        'failure',
    ];

}
