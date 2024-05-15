<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Video;
use App\Models\Folder; // Import model Folder
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        // Lấy tất cả các ID của các thư mục từ cơ sở dữ liệu
        $folderIds = Folder::pluck('id')->toArray();
        $folderid = $this->faker->randomElement($folderIds);
        $useid = Folder::where('id', $folderid)->first()->user_id;
        return [
            'slug' => uniqid(),
            'user_id' => $useid,
            'folder_id' => $folderid,
            'title' => $this->faker->sentence(),
            'poster' => $this->faker->imageUrl(),
            'grid_poster' => $this->faker->imageUrl(),
            'is_sub' => $this->faker->boolean(),
            'total_play' => $this->faker->numberBetween(0, 1000),
            'size' => $this->faker->numberBetween(1000000, 100000000),
            'duration' => $this->faker->numberBetween(60, 600),
            'quality' => $this->faker->randomElement(['none','SD', 'HD', 'FHD']),
            'format' => $this->faker->randomElement(['mp4', 'avi', 'mkv']),
            'soft_delete' => $this->faker->boolean(),

        ];
    }
}
