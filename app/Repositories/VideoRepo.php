<?php

namespace App\Repositories;

use App\Models\Folder;
use App\Models\Video;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;

class VideoRepo extends BaseRepository
{
    private string $cachePrefix = 'video:';
    public function model()
    {
        return Video::class;
    }
    public function getAllFolders($userId, $columns = ['*'])
    {
        return Folder::where('user_id', $userId)->select($columns)->get();
    }
    public function getAllUserVideo($userId, $tab, $search ,$column , $direction, $folderId, $limit, $columns = ['*']){

        $query = $this->query()
            ->where('user_id', $userId)
            ->where('folder_id', $folderId);
        // Nếu có tham số search, không sử dụng cache
        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        //Tạo cache key
//        $cacheKey = $this->cachePrefix . $userId . 'get_all' . $limit . '.' . implode(',', $columns);

        //Lấy cache
        //Todo: bỏ comment đoạn này khi triển khai thực tế để ăn cache, hiện dev thì để lấy từ db luôn test cho nó dễ
//        $video = Redis::get($cacheKey);
//        if (isset($video)){
//            return unserialize($video);
//        }

        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        if ($tab == 'processing') {
            $query->where('quality', 'none');
        } elseif ($tab == 'DMCA' || $tab == 'remove') {
            $query->where('soft_delete', '1');
        } else {
            $query->where('soft_delete', '0');
        }
        // Không có thì cache lại, Trả về kết quả, Ví dụ một query nào đó
        $videos = $query->orderBy($column1, $direction)
            ->paginate($limit);

//        Redis::setex($cacheKey, 259200, serialize($video));
        return $videos;
    }
    public function searchVideos($userId, $searchTerm,$limit,$column,$direction, $columns = ['*'], )
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

}
