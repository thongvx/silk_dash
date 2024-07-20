<?php

namespace App\Services\ServerDownload;

use App\Models\SvDownload;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class SvDownloadService
{
    public static function upsertSvDownload($svDownload)
    {
        $key = 'sv_download:' . $svDownload->name;

        // Kiểm tra xem key đã tồn tại trong Redis hay chưa
        if (Redis::exists($key)) {
            // Nếu key đã tồn tại, cập nhật thông tin
            Redis::hmset($key, [
                'active' => $svDownload->active,
                'cpu' => $svDownload->cpu,
                'percent_space' => $svDownload->percent_space,
                'out_speed' => $svDownload->out_speed,
                // thêm các thuộc tính khác của $svStream ở đây
            ]);
        } else {
            // Nếu key chưa tồn tại, thêm mới
            Redis::hmset($key, [
                'active' => $svDownload->active,
                'cpu' => $svDownload->cpu,
                'percent_space' => $svDownload->percent_space,
                'out_speed' => $svDownload->out_speed,
                // thêm các thuộc tính khác của $svStream ở đây
            ]);
            Redis::sadd('sv_download', $key);
        }
        Redis::expire($key, 120);
    }
    public static function selectSvDownload()
    {
        $svStreamKeys = Redis::smembers('sv_download');
        shuffle($svStreamKeys);
        foreach ($svStreamKeys as $svStreamKey) {
            $svStream = Redis::hgetall($svStreamKey);
            if ($svStream['active'] == 1 && $svStream['out_speed'] < 900 && $svStream['cpu'] < 15 && $svStream['percent_space'] < 95) {
                return $svStream['domain'];
            }
        }
        return null;
    }

    //get all svDownload
    public function getAllSvDownloads($column, $direction, $limit)
    {
        $data = SvDownload::orderBy($column, $direction)->paginate($limit);
        return $data;
    }
}
