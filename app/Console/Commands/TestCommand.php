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
        $dowloader = DownloadFactory::create('https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
        $dowloader->download();
        Redis::del('uploadProgress.https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
        echo Redis::get('uploadProgress.https://e61.etvp.cc/uploads/cShGp5cjErBm1UwG6hDwjkfObm4sFd0WfOt.mp4');
        $video = Video::create([
            'slug' => 'example-slug123',
            'user_id' => 1, // replace with actual user id
            'folder_id' => 1, // replace with actual folder id
            'sd' => 'sd-value', // replace with actual sd value
            'hd' => 'hd-value', // replace with actual hd value
            'fhd' => 'fhd-value', // replace with actual fhd value
            'title' => 'Example Title',
            'poster' => 'example-poster.jpg', // replace with actual poster file name
            'grid_poster' => 'example-grid-poster.jpg', // replace with actual grid poster file name
            'is_sub' => false,
            'total_play' => 0,
            'size' => 100, // replace with actual size
            'duration' => 120, // replace with actual duration
            'quality' => '720p', // replace with actual quality
            'format' => 'mp4', // replace with actual format

            'soft_delete' => false,
        ]);
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
