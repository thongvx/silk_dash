<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class UpdateTotalPlay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:totalplay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update total play count for each user from the report_data table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');

        DB::table('reports_data')
            ->select('user_id', DB::raw('SUM(views) as total_views'), DB::raw('SUM(revenue) as total_earning'))
            ->whereDate('date', $yesterday)
            ->groupBy('user_id')
            ->orderBy('user_id')
            ->chunk(50, function ($users) {
                foreach ($users as $user) {
                    $existingData = User::find($user->user_id);

                    if ($existingData) {
                        $existingData->play = ($existingData->play ?? 0)+ $user->total_views;
                        $existingData->earning = ($existingData->earning ?? 0)+ $user->total_earning;
                        $existingData->save();

                        $this->info("Updated total play and total earning for user ID {$user->user_id}");
                    } else {
                        $this->info("User ID {$user->user_id} not found");
                    }
                }
            });

        return 0;
    }
}
