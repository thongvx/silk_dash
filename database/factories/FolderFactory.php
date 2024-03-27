<?php

namespace Database\Factories;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFactory extends Factory
{
    protected $model = Folder::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'name_folder' => $this->faker->word,
            'number_file' => $this->faker->numberBetween(200, 400),
            'soft_delete' => 0,
        ];
    }
}
