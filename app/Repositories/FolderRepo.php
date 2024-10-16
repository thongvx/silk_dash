<?php

namespace App\Repositories;

use App\Enums\VideoCacheKeys;
use App\Models\Folder;
use App\Models\Video;
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
        $folders = Folder::where('user_id', $userId)
                    ->where('soft_delete', 0)
                    ->orderBy('id', 'desc')->get();
        if($folders->isEmpty()){
            Folder::create([
                'user_id' => $userId,
                'name_folder' => 'root',
                'number_file' => 0,
                'soft_delete' => 0,
            ]);
            // Refresh folders after creation
            $folders = Folder::where('user_id', $userId)
                ->where('soft_delete', 0)
                ->orderBy('id', 'desc')->get();
        }
        // Set cache
        Redis::setex($cacheKey, 259200, serialize($folders));

        return $folders;
    }

    // Get folder name
    public function getFolder($userid, $folderName)
    {
        return Folder::where('name_folder', $folderName)->where('user_id', $userid)->first();
    }
    public function incrementNumberOfFiles($folderId)
    {
        $userId = auth()->id();
        $key = VideoCacheKeys::All_Folder_For_User->value . $userId;
        $folder = $this->find($folderId);
        if ($folder) {
            $folder->increment('number_file');
        }
        Redis::del($key);
    }
    public function decrementNumberOfFiles($folderId)
    {
        $userId = auth()->id();
        $key = VideoCacheKeys::All_Folder_For_User->value . $userId;
        $folder = $this->find($folderId);
        if ($folder) {
            $folder->decrement('number_file');
        }
        Redis::del($key);
    }
}
