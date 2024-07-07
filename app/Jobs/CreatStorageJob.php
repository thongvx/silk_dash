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
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6IndNNEJWek04V2hsM3NnV3Z4OUpYV3c9PSIsInZhbHVlIjoiTVYvRnc0dmpIYTBOOCtFc0o3Wk5jcUF5TFNCTzRJOVFFUWlEdWNpQ3VhOUVUN3pBOS81WXMyaURyc05KcnJCQXJaWU9OWklaSXFoRVBrYjk3T1N2aCtZclUxcG5CT2xqbjYxSGgxUHFEbDcvTzJwdkNqR1JraSthZU9Gd1RoWWMiLCJtYWMiOiJhZDk1NWE1MDhmNzhmODcyN2Y1NGM2MjlmMmYxZmRmZjM0NDY2MTRiYzk4ZDRkYmQyMzg3MDgxZGEwYTQ3NzNjIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkFaMExEQmxQY3pmQ082TUFxY0RoL1E9PSIsInZhbHVlIjoiVnFLVlpmWGRIZXV3RkVQTGJBd1NlczA1OFNNTDJrZFUxZlBTZm11SkppWWM4c1pqRVFCdm1lYzRZQkIxVWx1citoSVUvbUdpcVI5K0lFNG01eGljUk9YaUt1ZGptOGI3Qk1yT3poSnBvejV0MTlhUTRXQkxGVW5IdzNwdWJvUnYiLCJtYWMiOiIwYmNiZjQ4MjMyYTQ1MzU0NGI0NDZlMjRlYTAyMWE1NjJiNzQ5MmMyZDk5YTg5ZGQ1YjNiODUxYTc4NjFjNjg0IiwidGFnIjoiIn0%3D'
            ),
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
