<?php

namespace App\Models;

use App\Enums\AccountSettingCacheKeys;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class PlayerSetting extends Model
{
    use HasFactory;

    protected $table = 'player_settings';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'show_title',
        'show_logo',
        'show_poster',
        'show_download',
        'show_preview',
        'enable_caption',
        'infinite_loop',
        'disable_adblock',
        'thumbnail_grid',
        'premium_color',
        'embed_width',
        'embed_height',
        'logo_link',
        'position',
        'poster_link',
        'power_url_logo',
        // Thêm các cột khác tương ứng vào đây
    ];

    /**
     * Get the user that owns the player setting.
     */
    protected static function boot()
    {
        parent::boot();

        //Đại diện cho hành vi thêm và sửa
        static::saved(function ($model) {
            $model->deleteCachePlayer();

        });

        static::deleted(function ($model) {
            $model-> deleteCachePlayer();

        });
    }

    public function deleteCachePlayer()
    {
        $keys = Redis::keys(AccountSettingCacheKeys::All_PlayerSetting_For_User->value . $this->user_id . '*');
        foreach ($keys as $key) {
            Redis::del($key);
        }
    }
}
