<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UpdateVideoViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:video-views';

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
        $keys = Redis::keys('video_views*');

        $updates = [];
        $upserts = [];

        $userViewKey = Redis::keys('user_views*');

        foreach ($userViewKey as $key) {
            $views = Redis::get($key);
            var_dump($key . " : " .$views);
        }

        foreach ($keys as $key) {
            $views = Redis::get($key);
            $viewInfo = explode(':', $key);
            var_dump($key . " : " .$views);

        }
    }
}
