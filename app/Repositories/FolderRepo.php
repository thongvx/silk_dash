<?php

namespace App\Repositories;

use App\Enums\VideoCacheKeys;
use App\Models\Folder;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;

class FolderRepo extends BaseRepository
{
    public function model()
    {
        return Folder::class;
    }

    // Get all folders
    public function getAllFolders($userId)
    {
        //Tạo cache key
        $cacheKey = VideoCacheKeys::All_Folder_For_User->value . $userId;

        $folders = Redis::get($cacheKey);
        // If data is not in cache
        if (isset($folders)){
            return unserialize($folders);
        }

        // Get folders
        $folders = Folder::where('user_id', $userId)->orderBy('id', 'desc')->get();

        // Set cache
        Redis::setex($cacheKey, 259200, serialize($folders));

        return $folders;
    }

    // Get folder name
    public function getFolderName($folderId)
    {
        return Folder::findOrFail($folderId);
    }
}
