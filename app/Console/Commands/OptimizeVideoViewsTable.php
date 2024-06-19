<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OptimizeVideoViewsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'optimize:video_views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old data and optimize the video_views table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::table('video_views')->where('date', '<', now()->subWeek())->delete();

        DB::unprepared('OPTIMIZE TABLE video_views');

        $this->info('The video_views table has been optimized.');

        return 0;
    }
}
