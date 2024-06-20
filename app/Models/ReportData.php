<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportData extends Model
{
    use HasFactory;

    // You can define the table name if it's not the plural form of the model name
    protected $table = 'report_data';

    // Define the fillable attributes
    protected $fillable = [
        'userid',
        'date',
        'country',
        'views',
        'download',
        'paid_views',
        'vpn_ads_views',
        'revenue',
    ];
}
