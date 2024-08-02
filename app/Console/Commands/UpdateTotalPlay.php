<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Video;

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
        DB::table('reports_data')
            ->select('user_id', DB::raw('SUM(views) as total_views'), DB::raw('SUM(revenue) as total_earning'))
            ->groupBy('user_id')
            ->orderBy('user_id')
            ->chunk(50, function ($users) {
                $updateData = [];

                foreach ($users as $user) {
                    $updateData[] = [
                        'user_id' => $user->user_id,
                        'total_play' => $user->total_views,
                        'total_earning' => $user->total_earning
                    ];

                    $this->info("Calculated total play count for user ID {$user->user_id}");
                }

                // Cập nhật dữ liệu theo lô
                foreach ($updateData as $data) {
                    User::where('id', $data['user_id'])->update([
                        'play' => $data['total_play'],
                        'earning' => $data['total_earning']
                    ]);
                    $this->info("Updated total play count for user ID {$data['user_id']}");
                }
            });

        return 0;
    }
}
