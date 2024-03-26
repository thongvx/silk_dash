<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SvStorage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sv_storages';

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
        'number_files',
        'cpu',
        'space',
        'used_space',
        'percent_space',
        'bw',
        'used_bw',
        'max_speed',
        'in_speed',
        'out_speed',
        'in_data',
        'provider',
        'active',
    ];
}
