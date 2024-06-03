<?php

namespace App\Console\Commands;

use App\Factories\DownloadFactory;
use App\Models\Video;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Redis;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

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
        Redis::set('transfer'.'1'.'-'.'dsanfjahsfjhbaijk', json_encode([
            'slug' => 'dsanfjahsfjhbaijk',
            'url' => 'dsanfjahsfjhbaijk',
            'status' => 1,
            'progress' => 12,
            'size_download' => 12,
            'size' => 123,
        ]));
        $keys = Redis::keys('transfer'.'1'.'-*');
        var_dump($keys);
    }
    function disguiseM3U8AsImage($m3u8FilePath, $originalImageFilePath)
    {
        // Đọc nội dung của file m3u8 và file ảnh gốc
        $m3u8Content = file_get_contents($m3u8FilePath);
        $originalImageContent = file_get_contents($originalImageFilePath);
        $newImageFilePath = public_path('output.png');
        // Tạo nội dung mới bằng cách nối nội dung file ảnh gốc và file m3u8
        $newContent = $originalImageContent . $m3u8Content;

        var_dump('ghi noi dung');
        // Ghi nội dung mới vào file ảnh đã được cải trang
        file_put_contents($newImageFilePath, $newContent);

        // Trả về đường dẫn của file ảnh đã được cải trang
        return $newImageFilePath;
    }
}
