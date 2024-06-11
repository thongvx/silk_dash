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



        // Tạo một SvStream
        $svStream = new SvStream();
        $svStream->name = 'ss02';
        $svStream->ip = 'ss02.streamsilk.com';
        $svStream->domain = 80;
        $svStream->cpu = 30; // Giả sử CPU là một số ngẫu nhiên từ 1 đến 20
        $svStream->percent_space = 0;
        $svStream->out_speed = 0;
        $svStream->active = 1;




        // Lưu SvStream thông qua SvStreamService
        SvStreamService::upsertSvStream($svStream);

        // Tạo một SvStream
        $svStream = new SvStream();
        $svStream->name = 'ss03';
        $svStream->ip = 'ss03.streamsilk.com';
        $svStream->domain = 80;
        $svStream->cpu = 5; // Giả sử CPU là một số ngẫu nhiên từ 1 đến 20
        $svStream->percent_space = 1;
        $svStream->out_speed = 800;
        $svStream->active = 1;

        // Lưu SvStream thông qua SvStreamService
        SvStreamService::upsertSvStream($svStream);

        // Tạo một SvStream
        $svStream = new SvStream();
        $svStream->name = 'ss01';
        $svStream->ip = 'ss01.streamsilk.com';
        $svStream->domain = 80;
        $svStream->cpu = 0; // Giả sử CPU là một số ngẫu nhiên từ 1 đến 20
        $svStream->percent_space = 0;
        $svStream->out_speed = 0;
        $svStream->active = 1;

        // Lưu SvStream thông qua SvStreamService
        SvStreamService::upsertSvStream($svStream);


        var_dump(SvStreamService::getAllStreamInfo());

        $this->info('server được chọn là: ');
        var_dump(SvStreamService::selectSvStream());
        $this->info('Chi tiết server được chọn: ');
        var_dump(SvStreamService::getStreamInfo(SvStreamService::selectSvStream()));
    }

}
