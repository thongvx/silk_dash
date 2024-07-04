<?php

namespace App\Repositories;

use App\Models\Activity;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Redis;
use App\Enums\AccountSettingCacheKeys;

class ActivityRepo extends BaseRepository
{
    public function model()
    {
        return Activity::class;
    }

    public function getAllActivity($userId)
    {
        $cacheKey = AccountSettingCacheKeys::All_Activity_For_User->value . $userId;
        $activity = Redis::get($cacheKey);
        if (isset($activity)){
            return unserialize($activity);
        }
        $activity = $this->query()
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
        Redis::setex($cacheKey, 259200, serialize($activity));
        return $activity;
    }
}
