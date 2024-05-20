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
        $dowloader = DownloadFactory::create('https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
        $dowloader->download();
        Redis::del('uploadProgress.https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
        echo Redis::get('uploadProgress.https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
    }
}
