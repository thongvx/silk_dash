<?php

namespace App\Console\Commands;

use App\Models\Video;
use Illuminate\Console\Command;
use Faker\Factory as Faker;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $userId = [1, 2, 3][rand(0, 2)]; // Chọn ngẫu nhiên userId từ 1, 2, 3
            $video = new Video();
            $video->videoID = 'video_' . $i;
            $video->userID = $userId;
            $video->middleVideoID = $faker->text;
            $video->originVideo = $faker->text;
            $video->folder = $faker->numberBetween(1, 10);
            $video->pathstream = $faker->text;
            $video->sd = $faker->text;
            $video->hd = $faker->text;
            $video->fhd = $faker->text;
            $video->softDelete = $faker->numberBetween(0, 1);
            $video->title = $faker->text;
            $video->poster = $faker->text;
            $video->gridposter = $faker->text;
            $video->sub = $faker->text;
            $video->totalPlay = $faker->numberBetween(0, 1000);
            $video->lastPlayed = $faker->numberBetween(0, 1000);

            $video->size = $faker->text;
            $video->duration = $faker->numberBetween(0, 3600);
            $video->quality = $faker->text;
            $video->format = $faker->text;
            $video->save();
        }
        $this->info('Generated 1000 random videos successfully.');
    }
}
