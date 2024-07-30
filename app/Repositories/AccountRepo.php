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
