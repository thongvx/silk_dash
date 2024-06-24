<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalculateDailyRevenue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revenue:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate daily revenue for each user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Lấy ngày hiện tại
        $today = Carbon::now()->format('Y-m-d');

        // Lấy dữ liệu từ bảng video_views
        $videoViews = DB::table('video_views')
            ->select('user_id', DB::raw('sum(views) as views'))
            ->where('date', $today)
            ->groupBy('user_id')
            ->get();

        // Duyệt qua từng dòng dữ liệu và thêm vào bảng report_data
        $batchSize = 20; // Số lượng dòng dữ liệu trong mỗi lô
        $batchData = []; // Mảng chứa dữ liệu của lô hiện tại

        foreach ($videoViews as $index => $videoView) {
            // Thêm dữ liệu vào lô hiện tại

            $vpnAdsView = 0;
            $download = 0;
            $paidView = ($videoView->views - $vpnAdsView) + $download;
            $cpm = 0.4;
            $batchData[] = [
                'user_id' => $videoView->user_id,
                'views' => $videoView->views,
                'date' => $today,
                'cpm' => $cpm,
                'vpn_ads_views' => $vpnAdsView,
                'paid_views' => $paidView,
                'download' => $download,
                'revenue' => $cpm * $paidView / 1000,
            ];

            // Nếu đã đủ số lượng dòng dữ liệu trong lô, hoặc đã duyệt hết dữ liệu
            if (($index + 1) % $batchSize === 0 || $index === count($videoViews) - 1) {
                // Chèn lô dữ liệu hiện tại vào database
                DB::table('reports_data')->insert($batchData);

                // Làm rỗng lô dữ liệu để chuẩn bị cho lô tiếp theo
                $batchData = [];
            }
        }
        $this->info('Daily revenue calculated successfully.');


        return 0;
    }
}
