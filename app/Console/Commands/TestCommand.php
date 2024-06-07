<?php

namespace App\Console\Commands;

use App\Factories\DownloadFactory;
use App\Models\SvStream;
use App\Models\Video;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Queue;
use App\Jobs\CreateHlsJob;

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
        $stream = 'ss01';
        $arrStream = explode('-', $stream);
        $svStream = SvStream::where('name', $stream)
            ->where('out_speed', '<', 700)
            ->where('active', 1)
            ->orderBy('out_speed', 'asc')
            ->value('name');
        return $svStream;

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
