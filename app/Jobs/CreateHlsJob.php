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

    protected $slug;
    protected $sv;
    protected $path;
    protected $sto480;
    protected $sto720;
    protected $sto1080;

    public function __construct($slug, $sv, $path, $sto480, $sto720, $sto1080)
    {
        $this->slug = $slug;
        $this->sv = $sv;
        $this->path = $path;
        $this->sto480 = $sto480;
        $this->sto720 = $sto720;
        $this->sto1080 = $sto1080;
    }

    public function handle()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.$this->sv.'./insertData?slug='.$this->slug.'&path='.$this->path.'&sto480='.$this->sto480.'&sto720='.$this->sto720.'&sto1080='.$this->sto1080,
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
