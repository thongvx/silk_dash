<?php

namespace App\Console\Commands;

use App\Factories\DownloadFactory;
use App\Models\SvStream;
use App\Models\Video;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Log\Logger;
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
        //Tạo một SvStream rồi sau đó lưu vào thông qua SvStreamService
        for ($i = 1; $i <= 10; $i++) {
            // Tạo một SvStream
            $svStream = new SvStream();
            $svStream->name = 'Server Stream ' . $i;
            $svStream->cpu = rand(1, 20); // Giả sử CPU là một số ngẫu nhiên từ 1 đến 20
            $svStream->percent_space = rand(1, 100);
            $svStream->out_speed = rand(100, 700);
            $svStream->active = 1;

            // Lưu SvStream thông qua SvStreamService
            SvStreamService::upsertSvStream($svStream);
        }

        var_dump(SvStreamService::getAllStreamInfo());

        $this->info('server được chọn là: ');
        var_dump(SvStreamService::selectSvStream());
        $this->info('Chi tiết server được chọn: ');
        var_dump(SvStreamService::getStreamInfo(SvStreamService::selectSvStream()));
    }

}
