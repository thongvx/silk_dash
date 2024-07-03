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
        $date = Carbon::today()->format('Y-m-d');
        $countryViews = [];

        foreach (array_chunk($keys, 50) as $chunk) {
            $upsertData = $this->prepareUpsertData($chunk, $date, $countryViews);
            $this->upsertView($upsertData);
        }
        $this->updateCountryViewsInRedis($countryViews);
        $keysToDelete = array_merge($keys, Redis::keys('watching_users:*'), Redis::keys('user:*:top_videos:*'));

        foreach ($keysToDelete as $key) {
            if (Redis::exists($key)) {
                Redis::del($key);
            }
        }
        $this->info('Video views updated successfully');
    }

    private function prepareUpsertData($chunk, $date, &$countryViews)
    {
        $upsertData = [];
        foreach ($chunk as $key) {
            $views = Redis::get($key);
            $viewInfo = explode(':', $key);
            $videoId = $viewInfo[1];
            $userId = $viewInfo[2];
            $country = $viewInfo[3];

            $upsertData[] = [
                'video_id' => $videoId,
                'user_id' => $userId,
                'views' => $views,
                'date' => $date,
            ];

            $countryViews[$userId][$country] = ($countryViews[$userId][$country] ?? 0) + $views;
        }

        return $upsertData;
    }

    private function updateCountryViewsInRedis($countryViews)
    {
        $date = Carbon::today()->format('Y-m-d');
        foreach ($countryViews as $userId => $countries) {
            foreach ($countries as $country => $views) {
                Redis::zincrby("user:{$userId}:country_views:{$date}", $views, $country);
            }
        }
    }

    public function upsertView($upsertData)
    {
        $query = "INSERT INTO video_views (video_id, user_id, date, views) VALUES ";

        $values = [];

        $cases = [];
        $ids = [];
        $pr = [];
        foreach ($upsertData as $data) {
            $values[] = "('{$data['video_id']}', '{$data['user_id']}', '{$data['date']}', '{$data['views']}')";

            $cases[] = "WHEN ? THEN ?";
            $pr[] = $data['video_id'];
            $pr[] = $data['views'];
            $ids[] = $data['video_id'];
        }

        $query .= implode(', ', $values);
        $query .= " ON DUPLICATE KEY UPDATE views = views + VALUES(views)";

        DB::statement($query);


        // Tạo câu lệnh SQL
        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        $query = "UPDATE `videos` SET `total_play` = `total_play` + CASE `id` {$cases} END WHERE `id` in ({$ids})";

        echo 'chay vao day';
        // Thực thi câu lệnh SQL
        DB::update($query, $pr);

    }

}
