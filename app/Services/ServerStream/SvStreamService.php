<?php

namespace App\Services\ServerStream;

use App\Models\SvStream;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class SvStreamService
{
    public static function upsertSvStream($svStream)
    {
        $key = 'sv_streams:' . $svStream->name;

        // Kiểm tra xem key đã tồn tại trong Redis hay chưa
        if (Redis::exists($key)) {
            // Nếu key đã tồn tại, cập nhật thông tin
            Redis::hmset($key, [
                'active' => $svStream->active,
                'cpu' => $svStream->cpu,
                'percent_space' => $svStream->percent_space,
                'out_speed' => $svStream->out_speed,
                'domain' => $svStream->domain,
                // thêm các thuộc tính khác của $svStream ở đây
            ]);
        } else {
            // Nếu key chưa tồn tại, thêm mới
            Redis::hmset($key, [
                'active' => $svStream->active,
                'cpu' => $svStream->cpu,
                'percent_space' => $svStream->percent_space,
                'out_speed' => $svStream->out_speed,
                'domain' => $svStream->domain,
                // thêm các thuộc tính khác của $svStream ở đây
            ]);
            Redis::sadd('sv_streams', $key);
        }
        Redis::expire($key, 120);
    }

    public static function selectSvStream()
    {
        $svStreamKeys = Redis::smembers('sv_streams');
        shuffle($svStreamKeys);
        foreach ($svStreamKeys as $svStreamKey) {
            $svStream = Redis::hgetall($svStreamKey);
            if ($svStream['active'] == 1 && $svStream['out_speed'] < 900 && $svStream['cpu'] < 10 && $svStream['percent_space'] < 95) {
                return $svStream['domain'];
            }
        }
        return null;
    }

    public static function deleteSvStreamInRedis($svStream)
    {
        $key = 'sv_streams:' . $svStream->name;
        Redis::del($key);
        Redis::srem('sv_streams', $key);
    }

    public static function getStreamInfo($svStreamName)
    {
        $key = 'sv_streams:' . $svStreamName;
        return Redis::hgetall($key);
    }

    //Get all stream server info
    public static function getAllStreamInfo()
    {
        $svStreamKeys = Redis::smembers('sv_streams');
        $svStreams = [];
        foreach ($svStreamKeys as $svStreamKey) {
            $svStream = Redis::hgetall($svStreamKey);
            $svStream['name'] = str_replace('sv_streams:', '', $svStreamKey);
            $svStreams[] = $svStream;
        }
        return $svStreams;
    }

    public function getAllSvStreams($column, $direction, $limit)
    {
        $user = Auth::user();
        $column == 'created_at' ? $column1 = 'id' : $column1 = $column;
        $cacheKey = 'svStreams:'.$column1.':'.$direction.':'.$limit;
        $svStreams = Redis::get($cacheKey);
        if (!$svStreams) {
            if ($user->hasRole('admin')) {
                $svStreams = SvStream::query()->orderBy($column1, $direction)->paginate($limit);
                Redis::setex($cacheKey, 259200, serialize($svStreams));
            }
        } else {
            $svStreams = unserialize($svStreams);
        }
        return $svStreams;
    }

    public static function checkConnectSvStream($arrStream)
    {
        $svStreamKeys = Redis::smembers('sv_streams');

        foreach ($svStreamKeys as $svStreamKey) {
            $svStreamName = str_replace('sv_streams:', '', $svStreamKey);

            if (in_array($svStreamName, $arrStream)) {
                $svStream = Redis::hgetall($svStreamKey);

                if ($svStream['out_speed'] < 900 && $svStream['active'] == 1) {
                    return $svStream['domain'];
                }
            }
        }

        // Nếu không tìm thấy server nào thỏa mãn, trả về null
        return null;
    }

}
