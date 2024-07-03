<?php

namespace App\Console\Commands;

use App\Services\StatisticService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

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
        $today = Carbon::yesterday()->format('Y-m-d');

        // Lấy dữ liệu từ bảng video_views
        $videoViews = DB::table('video_views')
            ->select('user_id', DB::raw('sum(views) as views'))
            ->where('date', $today)
            ->groupBy('user_id')
            ->get();

        // Duyệt qua từng dòng dữ liệu và thêm vào bảng report_data
        $batchSize = 20; // Số lượng dòng dữ liệu trong mỗi lô
        $batchData = []; // Mảng chứa dữ liệu của lô hiện tại
        $data_country_statistics = [];
        $data_country_statistics_size = 20;
        foreach ($videoViews as $index => $videoView) {
            // Thêm dữ liệu vào lô hiện tại

            $vpnAdsView = 0;
            $download = 0;
            $paidView = ($videoView->views - $vpnAdsView) + $download;
            $valueArr = StatisticService::calculateValue($videoView->user_id);
            $value = array_sum($valueArr);

            $cpm = $value / $videoView->views * 1000;
            $batchData[] = [
                'user_id' => $videoView->user_id,
                'views' => $videoView->views,
                'date' => $today,
                'cpm' => $cpm,
                'vpn_ads_views' => $vpnAdsView,
                'paid_views' => $paidView,
                'download' => $download,
                'revenue' => $value,
            ];
            // Nếu đã đủ số lượng dòng dữ liệu trong lô, hoặc đã duyệt hết dữ liệu
            if (($index + 1) % $batchSize === 0 || $index === count($videoViews) - 1) {
                // Chèn lô dữ liệu hiện tại vào database
                DB::table('reports_data')->insert($batchData);

                // Làm rỗng lô dữ liệu để chuẩn bị cho lô tiếp theo
                $batchData = [];
            }
        }

        $countryViewsKeys = Redis::keys("total:*:*");
        foreach ( $countryViewsKeys as $index => $key) {
            // Lấy views và downloads từ Redis
            $countryViews = Redis::get($key);
            $countryViews = $countryViews ?: 0;
            $user_id = explode(':', $key)[1];
            $countryvpnAdsView = 0;
            $countrydownload = 0;
            $countryCode = explode(':', $key)[2];
            $paidView = ($countryViews - $countryvpnAdsView) + $countrydownload;
            $revenue =   StatisticService::calculateValue($user_id)[$countryCode];
            // Tạo mới dữ liệu trong bảng country_statistics
            $data_country_statistics[] = [
                'user_id' => $user_id,
                'date' => $today,
                'country_code' => $countryCode,
                'views' => $countryViews,
                'paid_views' => $paidView,
                'vpn_ads_views' => $countryvpnAdsView,
                'download' => $countrydownload,
                'revenue' => $revenue,
            ];
            Redis::del($key);
            if (($index + 1) % $data_country_statistics_size === 0 || $index === count($countryViewsKeys) - 1) {
                // Chèn lô dữ liệu hiện tại vào database
                DB::table('country_statistics')->insert($data_country_statistics);

                // Làm rỗng lô dữ liệu để chuẩn bị cho lô tiếp theo
                $data_country_statistics = [];
            }
        }

        $this->info('Daily revenue calculated successfully.');

        return 0;
    }

}
