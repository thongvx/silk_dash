<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Folder;
use App\Models\Video;

class UpdateFolderFileCount extends Command
{
    protected $signature = 'update:folder-file-count';
    protected $description = 'Cập nhật số lượng file cho mỗi folder từ bảng videos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Folder::chunk(100, function ($folders) {
            foreach ($folders as $folder) {
                $count = Video::where('folder_id', $folder->id)
                    ->where('soft_delete', 0)
                    ->count();

                $folder->number_file = $count;
                $folder->save();

                $this->info('Updated folder ID: ' . $folder->id . ' with ' . $count . ' files.');
            }
        });

        $this->info('Update completed.');
    }
}
