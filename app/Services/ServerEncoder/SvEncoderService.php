<?php

namespace App\Services\ServerEncoder;

use App\Models\SvEncoder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;



class SvEncoderService
{
    public function getAllSvEncoders($column, $direction, $limit)
    {
        $column == 'created_at' ? $column1 = 'name' : $column1 = $column;
        $data = [];

        $keys = Redis::keys('sv_encoder:*');
        foreach ($keys as $key) {
            $data[] = Redis::hgetall($key);
        }
        $data = collect($data);
        $sortedData = $direction == 'desc'
            ? $data->sortByDesc($column1)
            : $data->sortBy($column1);

        // Manually paginate the sorted data
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $sortedData->slice(($currentPage - 1) * $limit, $limit)->values();
        $paginatedData = new LengthAwarePaginator($currentPageItems, $sortedData->count(), $limit, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return $paginatedData;
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
