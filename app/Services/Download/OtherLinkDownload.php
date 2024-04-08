<?php

namespace App\Services\Download;

use App\Contracts\DownloadInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class OtherLinkDownload implements DownloadInterface
{
    public string $url;

    // Constructor
    public function __construct($url)
    {
        $this->url = $url;
    }

    //Download file from direct link to local storage
    public function download()
    {
        // Extract file name from URL
        $fileName = basename($this->url);

        // Download file
        $client = new Client();
        $lastProgressDisplayTime = time();
        $client->get($this->url, [
            'sink' => storage_path('app/public/' . $fileName),
            'progress' => function (
                $downloadTotal, $downloadedBytes,
                $uploadTotal, $uploadedBytes
            ) use (&$lastProgressDisplayTime) {
//                if (time() - $lastProgressDisplayTime >= 1) {
                    $progress = round($downloadedBytes / $downloadTotal * 100);
                    echo 'Download progress: ' . $progress . "%\n";
                    Redis::setex('uploadProgress.'.$this->url, 30 * 60, $progress);
                    $lastProgressDisplayTime = time();
//                }
            }
        ]);
    }
}
