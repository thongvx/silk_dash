<?php

namespace App\Repositories;

use App\Enums\AccountSettingCacheKeys;
use App\Models\AccountSetting;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;

class AccountRepo extends BaseRepository
{
    public function model()
    {
        return AccountSetting::class;
    }

    public function getSetting($userId)
    {
        $cacheKey = AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $userId;
        $setting = unserialize(Redis::get($cacheKey));
        if (!$setting) {
            $setting = $this->query()
                ->where('user_id', $userId)
                ->first();
            if(!$setting) {
                $setting = AccountSetting::create([
                    'user_id' => $userId,
                    'earningModes' => 2,
                    'videoType' => 1,
                    'adblock' => 0,
                    'showTitle' => 0,
                    'logo' => 0,
                    'logoLink' => 0,
                    'position' => 0,
                    'poster' => 0,
                    'blockDirect' => 0,
                    'domain' => '0',
                    'publicVideo' => 0,
                    'premiumMode' => 0,
                    'captionsMode' => 0,
                    'disableDownload' => 0,
                    'gridPoster' => 1,
                    'embed_page' => 0,
                ]);
            }
            Redis::setex(AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $userId, 2592000, serialize($setting));
        }
        return $setting;
    }

    public function getSettingsByUserIds($userIds)
    {
        $settings = AccountSetting::whereIn('user_id', $userIds)->get();
        foreach ($settings as $setting) {
            $cacheKey = AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $setting->user_id;
            Redis::setex($cacheKey, 2592000, serialize($setting));
        }
        return $settings;
    }
}
