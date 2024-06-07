<?php

namespace App\Repositories;

use App\Models\Activity;
use Prettus\Repository\Eloquent\BaseRepository;

class ActivityRepo extends BaseRepository
{
    public function model()
    {
        return Activity::class;
    }

    public function getAllActivity($userId)
    {
        return $this->query()
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
