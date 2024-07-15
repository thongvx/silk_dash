<?php

namespace App\Console\Commands;

use App\Services\StatisticService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use App\Repositories\AccountRepo;


class CalculateDailyRevenue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revenue:calculate';
    protected $accountRepo;

    public function __construct(AccountRepo $accountRepo)
    {
        parent::__construct();
        $this->accountRepo = $accountRepo;
    }
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

        $alluserKeys = Redis::keys("total_user_views:{$today}:*");

        // Duyệt qua từng dòng dữ liệu và thêm vào bảng report_data
        $batchSize = 20; // Số lượng dòng dữ liệu trong mỗi lô
        $batchData = []; // Mảng chứa dữ liệu của lô hiện tại

        foreach ($alluserKeys as $index => $userKey) {
            $parts = explode(':', $userKey);
            $userId = $parts[2];
            echo $userId;
            $views = Redis::get($userKey) ?: 0;
            $totalImpressionViews = 0;
            $totalImpression1 = Redis::keys("total_impression1:{$today}:{$userId}:*");
            $totalImpression2 = Redis::keys("total_impression2:{$today}:{$userId}:*");
            if($totalImpression1){
                foreach ($totalImpression1 as $totalImpression1Key) {
                    // Lấy số lượt xem của user từ khóa
                    $views = Redis::get($totalImpression1Key);
                    // Cộng số lượt xem vào tổng số lượt xem
                    $totalImpressionViews += (int)$views;
                }
            }
            if($totalImpression2){
                foreach ($totalImpression2 as $totalImpression2Key) {
                    // Lấy số lượt xem của user từ khóa
                    $views = Redis::get($totalImpression2Key);
                    // Cộng số lượt xem vào tổng số lượt xem
                    $totalImpressionViews += (int)$views;
                }
            }
            $data_setting = $this->accountRepo->getSetting($userId);
            $earning = 0;
            // lay trang thai earning
            if ($data_setting->earningModes == 1) $earning = 0.5;
            if ($data_setting->earningModes == 2) $earning = 1;
            $valueArr = StatisticService::calculateValue($userId, $earning);
            $value = array_sum($valueArr);

            $download = 0;
            $paidView = $totalImpressionViews + $download;
            $vpnAdsView = $views - $paidView;
            $data_setting = $this->accountRepo->getSetting($userId);
            $earning = 0;

            $cpm = $paidView>0 ? $value / $paidView * 1000 : 0;
            $batchData[] = [
                'user_id' => $userId,
                'views' => $views,
                'date' => $today,
                'cpm' => $cpm,
                'vpn_ads_views' => $vpnAdsView,
                'paid_views' => $paidView,
                'download' => $download,
                'revenue' => $value,
            ];
            redis::del($userKey);
            // Nếu đã đủ số lượng dòng dữ liệu trong lô, hoặc đã duyệt hết dữ liệu
            if (($index + 1) % $batchSize === 0 || $index === count($alluserKeys) - 1) {
                // Chèn lô dữ liệu hiện tại vào database
                DB::table('reports_data')->insert($batchData);

                // Làm rỗng lô dữ liệu để chuẩn bị cho lô tiếp theo
                $batchData = [];
            }
        }

        $data_country_statistics = [];
        $data_country_statistics_size = 20;
        $countryViewsKeys = Redis::keys("total:{$today}:*:*");
        foreach ( $countryViewsKeys as $index => $key) {
            // Lấy views và downloads từ Redis
            $countryViews = Redis::get($key);
            $countryViews = $countryViews ?: 0;
            $user_id = explode(':', $key)[1];
            $countryCode = explode(':', $key)[2];
            $totalImpression1Views = Redis::get("total_impression1:{$today}:{$user_id}:$countryCode") ?: 0;
            $totalImpression2Views = Redis::get("total_impression2:{$today}:{$user_id}:$countryCode") ?: 0;
            $countryVpnAdsView = $countryViews - $paidView;
            $countryDownload = 0;
            $paidView = $totalImpression1Views+$totalImpression2Views + $countryDownload;
            $data_setting = $this->accountRepo->getSetting($userId);
            $earning = 0;
            // lay trang thai earning
            if ($data_setting->earningModes == 1) $earning = 0.5;
            if ($data_setting->earningModes == 2) $earning = 1;
            $revenue =  StatisticService::calculateValue($user_id, $earning)[$countryCode];
            // Tạo mới dữ liệu trong bảng country_statistics
            $data_country_statistics[] = [
                'user_id' => $user_id,
                'date' => $today,
                'country_code' => $countryCode,
                'views' => $countryViews,
                'paid_views' => $paidView,
                'vpn_ads_views' => $countryVpnAdsView,
                'download' => $countryDownload,
                'revenue' => $revenue,
            ];
            Redis::del($key);
            Redis::del("total_impression1:{$today}:{$user_id}:$countryCode");
            Redis::del("total_impression2:{$today}:{$user_id}:$countryCode");
            if (($index + 1) % $data_country_statistics_size === 0 || $index === count($countryViewsKeys) - 1) {
                // Chèn lô dữ liệu hiện tại vào database
                DB::table('country_statistics')->insert($data_country_statistics);

                // Làm rỗng lô dữ liệu để chuẩn bị cho lô tiếp theo
                $data_country_statistics = [];
            }
        }
        Redis::del("total_country_views:{$today}");
        $this->info('Daily revenue calculated successfully.');

        return 0;
    }

}
