<?php

namespace App\Console\Commands;

use App\Factories\DownloadFactory;
use App\Models\Video;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Redis;

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
        $dowloader = DownloadFactory::create('https://drive.google.com/file/d/1Bdb3d94-gl61-TSpLKLAtwhQ97_e1pFx/view');
        $dowloader->download();
        Redis::del('uploadProgress.https://drive.google.com/file/d/1Bdb3d94-gl61-TSpLKLAtwhQ97_e1pFx/view');
        echo Redis::get('uploadProgress.https://drive.google.com/file/d/1Bdb3d94-gl61-TSpLKLAtwhQ97_e1pFx/view');
    }
}
