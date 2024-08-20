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
            CURLOPT_URL => 'https://'.$this->sv.'/insertData?slug='.$this->slug.'&path='.$this->path.'&sto480='.$this->sto480.'&sto720='.$this->sto720.'&sto1080='.$this->sto1080,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Cookie: XSRF-TOKEN=eyJpdiI6InlzTTRnTFdCZitPYk9TSFAzK2llQXc9PSIsInZhbHVlIjoiRXRsTmRnU2tVbGg3cVBXQktCMXdOM2I0RWg2b0FmcThtVllKVW15c2x6QWNkd21wWk92NG9YV2RSMXhDRlo4U01uN2FvQXQzMmtTUmxwRDduU3ZzY2pKVGNmTWgvUVZoNFFGVlpHbWJqT29xZXMzMUtYOVpwK0xBWmZpeWNjOG8iLCJtYWMiOiJhYmYzNjI2YzJmMzk4ZjMzOWE2MWE2ZTU0NGRiMWNkZDdkMDZjMThiZWI4NTQ1MTUzOTJmMTY5NzE3YjAwYmQzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IitJUm42UHZ6QVNaNHp0Zk1DUjhHZHc9PSIsInZhbHVlIjoiZlVpTk9JWTZTVTJUWVN0S1VlUnRNMnpMRTJ6bjN6QnZHTVBCNk1RTVZSdklLUTh0YjdIWm45bWVLalRSeDdKOFE2MmY5UzIwb0tzZUlMeHNOQkhTUDlLK3hkUXMwMndiRHJ2aktMejYvTEJHVTZUVlF0WHMxallIREdBWGpHdjkiLCJtYWMiOiIwMDQ4NjNhZGVkNWQ4MDlmNjNiYjFlNjgyM2I1MTBmYTRkNTVkNDY4Zjc1OTg1N2ZiNzhjNGVkNjMwZTE4MzU5IiwidGFnIjoiIn0%3D'
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
