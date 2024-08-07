<?php

namespace App\Console\Commands;

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
    protected $signature = 'update:views';

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
        $keysWithContry = Redis::keys('country_video_views*');

        $date = Carbon::today()->format('Y-m-d');
        $countryViews = [];

        foreach (array_chunk($keysWithContry, 50) as $chunk) {
             $this->prepareUpsertCountryData($chunk, $date, $countryViews);
        }

        foreach (array_chunk($keys, 50) as $chunk) {
            $upsertData = $this->prepareUpsertData($chunk, $date);
            $this->upsertView($upsertData);
            //Todo: xoá view sau khi đã update xong
        }

        $this->updateCountryViewsInRedis($countryViews);
        $keysToDelete = array_merge($keys, $keysWithContry, Redis::keys('watching_users:*'), Redis::keys('user:*:top_videos:*'));

        foreach ($keysToDelete as $key) {
            if (Redis::exists($key)) {
                Redis::del($key);
            }
        }
        $this->info('Video views updated successfully');
    }

    private function prepareUpsertCountryData($chunk, $date, &$countryViews)
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

    private function prepareUpsertData($chunk, $date)
    {
        $upsertData = [];
        foreach ($chunk as $key) {
            $views = Redis::get($key);
            $viewInfo = explode(':', $key);
            $videoId = $viewInfo[1];
            $userId = $viewInfo[2];

            $upsertData[] = [
                'video_id' => $videoId,
                'user_id' => $userId,
                'views' => $views,
                'date' => $date,
            ];
        }

        return $upsertData;
    }

    private function updateCountryViewsInRedis($countryViews)
    {
        $date = Carbon::today()->format('Y-m-d');
        foreach ($countryViews as $userId => $countries) {
            foreach ($countries as $country => $views) {
                Redis::zincrby("user:{$userId}:country_views:{$date}", $views, $country);
                Redis::expire("user:{$userId}:country_views:{$date}", 86400);
            }
        }
    }

   public function upsertView($upsertData)
   {
        // Enable query log
        DB::enableQueryLog();


        // Your existing code to construct and execute the insert query
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
            var_dump('video id: ' . $data['video_id'].' views: '.$data['views']);
        }

        $query .= implode(', ', $values);
        $query .= " ON DUPLICATE KEY UPDATE views = views + VALUES(views)";

        // Execute the insert query
        DB::statement($query);

        // Log the insert query
        $log = DB::getQueryLog();
        $this->info('Insert Query: ' . json_encode(end($log)));

        // Clear query log to prevent memory issues
        DB::flushQueryLog();

        // Your existing code to construct and execute the update query
        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        $query = "UPDATE `videos` SET `total_play` = `total_play` + CASE `id` {$cases} END WHERE `id` in ({$ids})";

        // Enable query log again for the update query
        DB::enableQueryLog();

        // Execute the update query
        DB::update($query, $pr);

        // Log the update query
        $log = DB::getQueryLog();
        $this->info('Update Query: ' . json_encode(end($log)));

        // Clear query log again
        DB::flushQueryLog();
    }

}
