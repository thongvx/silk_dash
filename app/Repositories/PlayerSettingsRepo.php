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
//         If data is not in cache
        if (isset($playerSettings)){
            return unserialize($playerSettings);
        }

        // Get playerSettings
        $playerSettings = $this->query()
                        ->where('user_id', $userId)
                        ->orderBy('id', 'desc')->first();

        // Set cache
        Redis::setex($cacheKey, 259200, serialize($playerSettings));

        return $playerSettings;
    }

}
