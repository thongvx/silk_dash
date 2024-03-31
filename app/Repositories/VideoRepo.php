<?php

namespace App\Repositories;

use App\Models\Folder;
use App\Models\Video;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;

class VideoRepo extends BaseRepository
{
    private string $cachePrefix = 'videos:';
    public function model()
    {
        return Video::class;
    }
    //lay list folder
    public function getAllFolders($userId, $columns = ['*'])
    {
        return Folder::where('user_id', $userId)->select($columns)->get();
    }
    //folder hien tai
    public function getFolderName($folderId)
    {
        return Folder::findOrFail($folderId);
    }
    public function getAllUserVideo($userId, $search = false,$column , $direction, $folderId, $limit, $columns = ['*']){

        // Nếu có tham số search, không sử dụng cache
        if ($search) {
            //Ví dụ một query gì đó
            return $this->query()
                ->where('user_id', $userId)
                ->where('title', 'LIKE', '%'.$search.'%')
                ->select($columns)
                ->orderBy($column, $direction)
                ->paginate($limit);
        }
        //Tạo cache key
//        $cacheKey = $this->cachePrefix . $userId . 'get_all' . $limit . '.' . implode(',', $columns);

        //Lấy cache
        //Todo: bỏ comment đoạn này khi triển khai thực tế để ăn cache, hiện dev thì để lấy từ db luôn test cho nó dễ
//        $videos = Redis::get($cacheKey);
//        if (isset($videos)){
//            return unserialize($videos);
//        }
        // Không có thì cache lại, Trả về kết quả, Ví dụ một query nào đó
        $videos = $this->query()
//            ->where('user_id', $userId)
            ->where('folder_id', $folderId)
            ->select($columns)
            ->orderBy($column, $direction)
            ->paginate($limit);

//        Redis::setex($cacheKey, 259200, serialize($videos));
        return $videos;
    }


}
