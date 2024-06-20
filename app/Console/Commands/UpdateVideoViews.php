<?php

namespace App\Console\Commands;

use App\Models\VideoView;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UpdateVideoViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:video-views';

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
        $keys = Redis::keys('video_views*');

        $chunks = array_chunk($keys, 20);
        $date = Carbon::today()->format('Y-m-d');
        $countryViews = [];
        $tempData = [];

        foreach ($chunks as $chunk) {
            foreach ($chunk as $key) {
                $views = Redis::get($key);
                $viewInfo = explode(':', $key);
                $videoId = $viewInfo[1];
                $userId = $viewInfo[2];
                $country = $viewInfo[3];

                // Tính toán tổng số lượt xem theo từng video_id, user_id và date
                if (!isset($tempData[$videoId][$userId][$date])) {
                    $tempData[$videoId][$userId][$date] = 0;
                }
                $tempData[$videoId][$userId][$date] += $views;

                // Tính toán tổng số lượt xem theo từng quốc gia
                if (!isset($countryViews[$userId][$country])) {
                    $countryViews[$userId][$country] = 0;
                }
                $countryViews[$userId][$country] += $views;
            }
        }

        // Chuyển dữ liệu từ mảng tạm thời vào mảng $upsertData
        $upsertData = [];
        foreach ($tempData as $videoId => $users) {
            foreach ($users as $userId => $dates) {
                foreach ($dates as $date => $views) {
                    $upsertData[] = [
                        'video_id' => $videoId,
                        'user_id' => $userId,
                        'views' => DB::raw("views + {$views}"),
                        'date' => $date,
                    ];
                }
            }
        }

        VideoView::upsert($upsertData, ['video_id', 'user_id', 'date'], ['views']);

        // Cập nhật số lượt xem theo từng quốc gia vào Redis
        foreach ($countryViews as $userId => $countries) {
            foreach ($countries as $country => $views) {
                Redis::zincrby("user:{$userId}:country_views", $views, $country);
            }
        }
    }
}
