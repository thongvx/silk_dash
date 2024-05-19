<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSetting extends Model
{
    use HasFactory;

    protected $table = 'account_settings';

    protected $fillable = [
        'user_id',
        'earningModes' ,
        'videoType',
        'adblock',
        'showTitle',
        'logo',
        'logoLink',
        'position',
        'poster',
        'blockDirect',
        'domain',
        'publicVideo',
        'premiumMode',
        'captionsMode',
        'disableDownload',
        'gridPoster',
    ];
}
