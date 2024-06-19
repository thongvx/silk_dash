<?php

namespace App\Services\ServerStorage;

use App\Models\SvStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class SvStorageService
{
    public function getALlSvStorages($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($user->hasRole('admin')) {
            $svStorage = SvStorage::query()->orderBy($column1, $direction)->paginate($limit);
        }
        return $svStorage;
    }

}
