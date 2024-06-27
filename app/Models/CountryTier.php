<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTier extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'code',
        'name',
        'tier',
    ];

}
