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
        if ($user->hasRole('admin')) {
            $svEncoders = SvEncoder::query()->orderBy($column1, $direction)->paginate($limit);
        }
        return $svEncoders;
    }
    public static function upsertSvEncoder($svEncoder)
    {
        $key = 'sv_encoder:' . $svEncoder->name;

        if (Redis::exists($key)) {
            Redis::hmset($key, [
                'name' => $svEncoder->name,
                'cpu' => $svEncoder->cpu,
                'usedSpace' => $svEncoder->usedSpace,
                'percent_space' => $svEncoder->percent_space,
                'inSpeed' => $svEncoder->inSpeed,
                'out_speed' => $svEncoder->out_speed,
                'encoder_task' => $svEncoder->encoder_task,
                'transfer_task' => $svEncoder->transfer_task,
                'taskFF' => $svEncoder->taskFF,
                'active' => 1,
            ]);
        } else {
            // Nếu key chưa tồn tại, thêm mới
            Redis::hmset($key, [
                'name' => $svEncoder->name,
                'cpu' => $svEncoder->cpu,
                'usedSpace' => $svEncoder->usedSpace,
                'percent_space' => $svEncoder->percent_space,
                'inSpeed' => $svEncoder->inSpeed,
                'out_speed' => $svEncoder->out_speed,
                'encoder_task' => $svEncoder->encoder_task,
                'transfer_task' => $svEncoder->transfer_task,
                'taskFF' => $svEncoder->taskFF,
                'active' => 1,
            ]);
            Redis::sadd('sv_encoder', $key);
        }
        Redis::expire($key, 120);
    }
}
