<?php

namespace App\Repositories;

use App\Models\Video;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\VideoCacheKeys;

class VideoRepo extends BaseRepository
{
    public function model()
    {
        return Video::class;
    }

    public function getAllUserVideo($userId, $tab, $search, $column, $direction, $folderId, $limit, $columns = ['*'], $page)
    {

        $query = $this->query()
            ->where('user_id', $userId)
            ->where('folder_id', $folderId);
//        // Nếu có tham số search, không sử dụng cache
//        if ($search) {
//            $query->where('title', 'LIKE', '%' . $search . '%');
//        }
        //Tạo cache key
//        $cacheKey = VideoCacheKeys::ALL_VIDEO_FOR_USER->value . $userId .'tab'. $tab . 'get_all' . $limit . '.' . implode(',', $columns).'direction' . $direction .'column'.$column. 'folderId'.$folderId . '.page'. $page;

        //Lấy cache
//        $video = Redis::get($cacheKey);
//        if (isset($video)){
//            return unserialize($video);
//        }

        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        // Không có thì cache lại, Trả về kết quả, Ví dụ một query nào đó
        $videos = $query->orderBy($column1, $direction)
            ->paginate($limit);

//        Redis::setex($cacheKey, 259200, serialize($videos));
        return $videos;
    }

    public function searchVideos($userId, $searchTerm, $limit, $column, $direction, $columns = ['*'],)
    {
        return $this->query()
            ->where('user_id', $userId)
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'LIKE', '%' . $searchTerm . '%');
            })
            ->orderBy($column, $direction)
            ->paginate($limit);
    }


    public function findVideoBySlug($slug)
    {
        $video = unserialize(Redis::get(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug));

        if (!$video) {
            $video = $this->query()->where('slug', $slug)->first();
            Redis::setex(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug, 259200, serialize($video));
        }

        return $video;
    }
}
