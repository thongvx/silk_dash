<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\Video;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AccountSetting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Folder::truncate();
        Video::truncate();
        AccountSetting::truncate();
        // Tạo dữ liệu giả lập cho bảng 'folder'


        Folder::factory()->count(50)->create()->each(function ($folder) {
            Video::factory()->count($folder->number_file)->create([
                'folder_id' => $folder->id,
                'user_id' => $folder->user_id,
            ]);
        });
        $users = User::all();

        $users->each(function ($user) {
            AccountSetting::factory()->create(['user_id' => $user->id]);
        });
    }
}
