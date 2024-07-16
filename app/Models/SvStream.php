<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvStream extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sv_stream';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ip',
        'ip_lan',
        'ipv6',
        'domain',
        'pass',
        'port',
        'number_video',
        'cpu',
        'space',
        'used_space',
        'percent_space',
        'max_speed',
        'in_speed',
        'out_speed',
        'provider',
        'in_data',
        'active',
    ];
}
