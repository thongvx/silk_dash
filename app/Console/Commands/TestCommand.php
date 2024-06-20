<?php

namespace App\Console\Commands;

use App\Factories\DownloadFactory;
use App\Models\SvStream;
use App\Models\Video;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Queue;
use App\Jobs\CreateHlsJob;

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

    }

}
