<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateHlsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $videoId;
    protected $slug;

    public function __construct($videoId)
    {
        $this->videoId = $videoId;
    }

    public function handle()
    {
        // Logic xử lý job ở đây

        //lựa chọn con edge server nào đó gắn tag cho job là ở con edge đấy để xử lý

        sleep(5);
        return 'ahihi do ngok '.$this->videoId;

        //xử lý logic Đẩy request sang service khác edge
        //Curl den edge server

    }
}
