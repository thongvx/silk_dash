<?php

namespace App\Repositories;

use App\Models\AccountSetting;
use Prettus\Repository\Eloquent\BaseRepository;

class AccountRepo extends BaseRepository
{
    public function model()
    {
        return AccountSetting::class;
    }

    public function getAllSetting($userId)
    {
        return $this->query()
            ->where('user_id', $userId)
            ->first();
    }
}
