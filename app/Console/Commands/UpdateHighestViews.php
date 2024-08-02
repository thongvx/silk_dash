<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateHighestViews extends Command
{
    protected $signature = 'views:update-total';
    protected $description = 'Update highest views from video_views to videos table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch the highest view counts for each video_id
        DB::table('video_views')
            ->select('video_id', DB::raw('SUM(views) as total_views'))
            ->groupBy('video_id')
            ->orderBy('video_id')
            ->chunk(50, function ($records) {
                foreach ($records as $record) {
                    // Update the highest view count in the videos table
                    DB::table('videos')
                        ->where('id', $record->video_id)
                        ->update(['total_play' => $record->total_views]);

                    $this->info("Updated highest views for video ID {$record->video_id}");
                }
            });

        return 0;
    }
}
