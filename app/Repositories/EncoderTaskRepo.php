<?php

namespace App\Repositories;

use App\Models\EncoderTask;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\DB;

class EncoderTaskRepo extends BaseRepository
{
    public function model()
    {
        return EncoderTask::class;
    }

    // Get all EncoderTasks
    public function getAllEncoderTasks($userId, $column = 'created_at', $direction = 'asc', $limit = 20, $page = 1)
    {
        // Create a subquery
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
            ->mergeBindings($subQuery->getQuery()); // you need to get underlying Query Builder

        // Order the results
        $query->orderBy($column, $direction);

        // Paginate the results
        $encoderTasks = $query->paginate($limit, ['*'], 'page', $page);

        return $encoderTasks;
    }

}
