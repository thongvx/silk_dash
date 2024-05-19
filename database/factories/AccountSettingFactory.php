<?php

namespace Database\Factories;

use App\Models\AccountSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'videoType' => $this->faker->numberBetween(1, 3),
            'earningModes' => $this->faker->numberBetween(1, 3),
            'adblock' => $this->faker->boolean,
            'showTitle' => $this->faker->boolean,
            'logo' => $this->faker->imageUrl(),
            'logoLink' => $this->faker->optional()->url,
            'position' => $this->faker->word,
            'poster' => $this->faker->imageUrl(),
            'blockDirect' => $this->faker->boolean,
            'domain' => $this->faker->word,
            'publicVideo' => $this->faker->boolean,
            'premiumMode' => $this->faker->boolean,
            'captionsMode' => $this->faker->boolean,
            'disableDownload' => $this->faker->boolean,
            'gridPoster' => $this->faker->randomDigit,
        ];
    }
}
