<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Folder::truncate();
        Video::truncate();
        // Tạo dữ liệu giả lập cho bảng 'folder'


        Folder::factory()->count(600)->create()->each(function ($folder) {
            Video::factory()->count($folder->number_file)->create([
                'folder_id' => $folder->id,
                'user_id' => $folder->user_id,
            ]);
        });
    }
}
