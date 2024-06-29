<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

class UpdateViewsHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:views-hour';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update views count every hour';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::table('video_views')->select('user_id')->distinct()->get(); // Get all distinct users from video_views

        foreach ($users as $user) {
            $currentHour = Carbon::now()->hour;
            $previousHour = $currentHour - 1;
            $userId = $user->user_id; // Get the user ID

            // Get the views count from the video_views table for the current hour
            $currentHourViews = DB::table('video_views')
                ->where('user_id', $userId)
                ->whereBetween('created_at', [Carbon::now()->startOfHour(), Carbon::now()])
                ->count();
            $previousHourViews = DB::table('video_views')
                ->where('user_id', $userId)
                ->whereBetween('created_at', [Carbon::now()->subHour()->startOfHour(), Carbon::now()->subHour()])
                ->count();
            // If we are in the first 5 minutes of the hour, we need to create a new key for the previous hour
            if (Carbon::now()->minute == 0) {
                Redis::set("user:{$userId}:hourly_views:{$previousHour}", $previousHourViews);
            }

            // Update the views count for the current hour
            Redis::set("user:{$userId}:hourly_views:{$currentHour}", $currentHourViews);
        }
    }
}
