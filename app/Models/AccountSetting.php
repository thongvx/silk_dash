<?php

namespace App\Models;

use App\Enums\AccountSettingCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

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
        'embed_page'
    ];


    protected static function boot()
    {
        parent::boot();
        static::created(function ($model){
            Redis::sex(AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $model->user_id, serialize($model));
        });
        static::saved(function ($model) {
            Redis::del(AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $model->user_id);
        });
    }



}
