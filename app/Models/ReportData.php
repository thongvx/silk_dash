<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class ReportData extends Model
{
    use HasFactory;

    // You can define the table name if it's not the plural form of the model name
    protected $table = 'reports_data';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'date',
        'country',
        'views',
        'download',
        'paid_views',
        'vpn_ads_views',
        'cpm',
        'revenue',
    ];
    protected static function boot()
    {
        parent::boot();

        // Define the behavior for create and update
        static::saved(function ($model) {
            Redis::del("user:{$model->user_ID}:total_profit");
        });

        static::deleted(function ($model) {
            Redis::del("user:{$model->user_ID}:total_profit");
        });

    }
}
