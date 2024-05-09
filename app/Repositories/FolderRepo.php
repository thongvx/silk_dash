<?php

namespace App\Repositories;

use App\Models\Folder;
use Prettus\Repository\Eloquent\BaseRepository;

class FolderRepo extends BaseRepository
{
    public function model()
    {
        return Folder::class;
    }

    // Get all folders
    public function getAllFolders()
    {
        return Folder::orderBy('id', 'desc')->get();
    }

    // Get folder name
    public function getFolderName($folderId)
    {
        return Folder::findOrFail($folderId);
    }
}
