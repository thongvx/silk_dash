<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvEncoder extends Model
{
    protected $table = 'sv_encoders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ip',
        'pass',
        'port',
        'upload',
        'encoder',
        'transfer',
        'torrent',
        'cpu',
        'space',
        'used_space',
        'max_speed',
        'in_speed',
        'out_speed',
        'provider',
        'active',
    ];

}
