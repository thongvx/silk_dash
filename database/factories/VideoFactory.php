<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(3), // Tạo một slug ngẫu nhiên với độ dài là 3
            'user_id' => $this->faker->numberBetween(100000, 999999),
            'title' => $this->faker->sentence(),
            'poster' => $this->faker->imageUrl(),
            'grid_poster' => $this->faker->imageUrl(),
            'is_sub' => $this->faker->boolean(),
            'total_play' => $this->faker->numberBetween(0, 1000),
            'size' => $this->faker->numberBetween(1000000, 100000000),
            'duration' => $this->faker->numberBetween(60, 600),
            'quality' => $this->faker->randomElement(['SD', 'HD', 'FHD']),
            'format' => $this->faker->randomElement(['mp4', 'avi', 'mkv']),
            'soft_delete' => $this->faker->boolean(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
