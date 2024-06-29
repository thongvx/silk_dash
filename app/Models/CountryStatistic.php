<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryStatistic extends Model
{
    protected $table = 'country_statistics';

    protected $fillable = [
        'user_id',
        'country_code',
        'views',
        'download',
        'paid_views',
        'vpn_ads_views',
        'revenue',
        'date'
    ];
}
