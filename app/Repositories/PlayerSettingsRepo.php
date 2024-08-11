<?php

namespace App\Repositories;

use App\Enums\AccountSettingCacheKeys;
use App\Models\PlayerSetting;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;

class PlayerSettingsRepo extends BaseRepository
{
    public function model()
    {
        return PlayerSetting::class;
    }

    // Get all PlayerSettings
    public function getAllPlayerSettings($userId)
    {
        //Tạo cache key
        $cacheKey = AccountSettingCacheKeys::All_PlayerSetting_For_User->value . $userId;

        $playerSettings = Redis::get($cacheKey);
        if (isset($playerSettings)){
            return unserialize($playerSettings);
        }

        // Get playerSettings
        $playerSettings = $this->query()
                        ->where('user_id', $userId)
                        ->orderBy('id', 'desc')->first();
        if(!$playerSettings){
            $playerSettings = PlayerSetting::create([
                'user_id' => $userId,
                'show_title' => 1,
                'show_logo' => 1,
                'show_poster' => 0,
                'show_download' => 0,
                'show_preview' => 1,
                'enable_caption' => 1,
                'infinite_loop' => 0,
                'disable_adblock' => 0,
                'thumbnail_grid' => 1,
                'premium_color' => '#05ffff',
                'embed_width' => 800,
                'embed_height' => 600,
                'logo_link' => 'https://streamsilk.com/image/logo/name.webp',
                'position' => 'control-bar',
                'poster_link' => 0,
            ]);
        }
        // Set cache
        Redis::setex($cacheKey, 259200, serialize($playerSettings));

        return $playerSettings;
    }

}
