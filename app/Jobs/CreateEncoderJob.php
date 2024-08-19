<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateEncoderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $slug;
    protected $sv;
    protected $quality;
    protected $format;
    protected $statusEncoder;
    protected $sv_upload;

    public function __construct($slug, $sv, $quality, $format, $statusEncoder, $sv_upload)
    {
        $this->slug = $slug;
        $this->sv = $sv;
        $this->quality = $quality;
        $this->format = $format;
        $this->statusEncoder = $statusEncoder;
        $this->sv_upload = $sv_upload;
    }

    public function handle()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://'.$this->sv.'.encosilk.cc/addEncoderTask?slug='.$this->slug.'&quality='.$this->quality.'&format='.$this->format.'&status='.$this->statusEncoder.'&svUpload='.$this->sv_upload,
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
