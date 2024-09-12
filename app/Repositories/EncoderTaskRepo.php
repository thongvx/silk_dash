<?php

namespace App\Repositories;

use App\Models\EncoderTask;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Enums\VideoCacheKeys;

class EncoderTaskRepo extends BaseRepository
{
    public function model()
    {
        return EncoderTask::class;
    }

    // Get all EncoderTasks
    public function getAllEncoderTasks($userId, $column = 'created_at', $direction = 'asc', $limit = 20, $page = 1)
    {
        $cacheKey = VideoCacheKeys::ALL_ENCODER_TASKS->value . $userId . 'get_all' .'direction' . $direction .'column'.$column . '.page'. $page;

        $encoderTasks = Redis::get($cacheKey);
        if (isset($encoderTasks)){
            return unserialize($encoderTasks);
        }

        $subQuery = EncoderTask::where('user_id', $userId)
            ->select('slug', 'size',
                        DB::raw('GROUP_CONCAT(quality) as qualities'),
                        DB::raw('GROUP_CONCAT(status) as status'),
                        DB::raw('count(*) as total'),
                        DB::raw('MAX(created_at) as created_at'),
                        DB::raw('MAX(updated_at) as updated_at')
                    )
            ->groupBy('slug','size');

        // Start a new query with the subquery
        $query = DB::table(DB::raw("({$subQuery->toSql()}) as sub"))
            ->mergeBindings($subQuery->getQuery())
            ->join('videos', 'sub.slug', '=', 'videos.slug')
            ->select('sub.*', 'videos.title');


        // Order the results
        $query->orderBy($column, $direction);

        // Paginate the results
        $encoderTasks = $query->paginate($limit, ['*'], 'page', $page);
        Redis::setex($cacheKey, 259200, serialize($encoderTasks));

        return $encoderTasks;
    }

}
