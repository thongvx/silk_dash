<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatStorageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $slug;
    protected $sv;
    protected $quality;
    protected $sv_encoder;

    public function __construct($slug, $sv, $quality, $sv_encoder)
    {
        $this->slug = $slug;
        $this->sv = $sv;
        $this->quality = $quality;
        $this->sv_encoder = $sv_encoder;
    }

    public function handle()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://'.$this->sv.'.stosilk.cc/startStorageTask?slug='.$this->slug.'&sv='.$this->sv_encoder.'&quality='.$this->quality,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',

        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    public function tags()
    {
        return [$this->sv];
    }
}
