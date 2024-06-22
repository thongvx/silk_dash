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

        Redis::del($keys);
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
        foreach ($countryViews as $userId => $countries) {
            foreach ($countries as $country => $views) {
                Redis::zincrby("user:{$userId}:country_views", $views, $country);
            }
        }
    }

    public function upsertView($upsertData)
    {
        $query = "INSERT INTO video_views (video_id, user_id, date, views) VALUES ";

        $values = [];
        foreach ($upsertData as $data) {
            $values[] = "('{$data['video_id']}', '{$data['user_id']}', '{$data['date']}', '{$data['views']}')";
            Redis::del("user:{$data['user_id']}:top_videos:{$data['date']}");
        }

        $query .= implode(', ', $values);
        $query .= " ON DUPLICATE KEY UPDATE views = views + VALUES(views)";

        DB::statement($query);
    }

}
