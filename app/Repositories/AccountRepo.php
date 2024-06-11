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
        $setting = unserialize(Redis::get(AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $userId));
        if (!$setting) {
            $setting = $this->query()
                ->where('user_id', $userId)
                ->first();
            Redis::setex(AccountSettingCacheKeys::GET_ACCOUNT_SETTING_BY_USER_ID->value . $userId, 2592000, serialize($setting));

        }
        return $setting;
    }
}
