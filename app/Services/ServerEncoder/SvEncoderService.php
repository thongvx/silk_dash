<?php

namespace App\Services\ServerEncoder;

use App\Models\SvEncoder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class SvEncoderService
{
    public function getAllSvEncoders($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $cacheKey = 'svEncoders:'.$column1.':'.$direction.':'.$limit;
        $svEncoders = Redis::get($cacheKey);
        if (!$svEncoders) {
            if ($user->hasRole('admin')) {
                $svEncoders = SvEncoder::query()->orderBy($column1, $direction)->paginate($limit);
                Redis::setex($cacheKey, 259200, serialize($svEncoders));
            }
        } else {
            $svEncoders = unserialize($svEncoders);
        }
        return $svEncoders;
    }
}
