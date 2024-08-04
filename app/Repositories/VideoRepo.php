<?php

namespace App\Repositories;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\VideoCacheKeys;


class VideoRepo extends BaseRepository
{
    public function model()
    {
        return Video::class;
    }
    public function getAllUserVideo($userId, $tab ,$column , $direction, $folderId, $limit, $page, $columns = ['*'])
    {

        $query = $this->query()
            ->where('user_id', $userId);
        //Tạo cache key
        $columnsString = is_array($columns) ? implode(',', $columns) : $columns;
        $cacheKey = VideoCacheKeys::ALL_VIDEO_FOR_USER->value . $userId . 'tab' . $tab . 'get_all' . $limit . '.' . $columnsString . 'direction' . $direction . 'column' . $column . 'folderId' . $folderId . '.page' . $page;
        //Lấy cache
        $video = Redis::get($cacheKey);
        if (isset($video)) {
            return unserialize($video);
        }

        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        // Không có thì cache lại, Trả về kết quả, Ví dụ một query nào đó
        if ($tab == 'removed') {
            $query->where('soft_delete', 1);
        } elseif ($tab == 'dmca'){
            $query->where('soft_delete', 2);
        }else {
            $query->where('soft_delete', 0)
                  ->where('folder_id', $folderId);
        }
        $videos = $query->orderBy($column1, $direction)
            ->paginate($limit);

        Redis::setex($cacheKey, 259200, serialize($videos));
        return $videos;
    }

    public function searchVideos($userId, $searchTerm, $limit, $column, $direction, $columns = ['*'],)
    {
        $videos = $this->query();
        if($userId){
            $videos = $videos->where('user_id', $userId);
        };
        $videos = $videos
                ->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('slug', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orderBy($column, $direction)
                ->paginate($limit);
        return $videos;
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

    public function countVideos($folderId)
    {
        $cacheKey = VideoCacheKeys::COUNT_VIDEO_FOR_FOLDER->value . $folderId;
        $count = Redis::get($cacheKey);
        if (isset($count)) {
            return unserialize($count);
        }
        $count = $this->query()->where('folder_id', $folderId)->where('soft_delete', 0)->total();
        Redis::setex($cacheKey, 259200, serialize($count));
        return $count;
    }

}
