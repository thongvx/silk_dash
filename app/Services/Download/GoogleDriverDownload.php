<?php

namespace App\Services\Download;

use App\Contracts\DownloadInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;

class GoogleDriverDownload implements DownloadInterface
{
    public string $url;

    // Constructor
    public function __construct($url)
    {
        $this->url = $url;
    }

    //Download file from Google Drive to local storage
    public function download()
    {
        $fileId = $this->extractGoogleDriveIdFromUrl($this->url);
        $apiKey = config('app.google_api_key');

        // Get file metadata
        $metadataUrl = "https://www.googleapis.com/drive/v3/files/{$fileId}?key={$apiKey}";
        $metadata = json_decode(file_get_contents($metadataUrl), true);
        $fileName = $metadata['name'];

        // Download file
        $downloadUrl = "https://www.googleapis.com/drive/v3/files/{$fileId}?key={$apiKey}&alt=media";

        $client = new Client();
        $lastProgressDisplayTime = time();
        $client->get($downloadUrl, [
            'sink' => storage_path('app/public/' . $fileName),
            'progress' => function (
                $downloadTotal, $downloadedBytes,
            ) use (&$lastProgressDisplayTime) {
                if (time() - $lastProgressDisplayTime >= 1 && $downloadTotal) {
                    if ($downloadTotal > 0) {
                        $progress = round($downloadedBytes / $downloadTotal * 100);
                        echo 'Download progress: ' . $progress . "\n";
                        Redis::setex('uploadProgress.'.$this->url, 30 * 60, $progress);
                    }
                    $lastProgressDisplayTime = time();
                }
                if($downloadedBytes == $downloadTotal && $downloadTotal)
                    echo 'Download progress: 100' . "%\n";
            }
        ]);
    }

    private function extractGoogleDriveIdFromUrl($url): string
    {
        preg_match('/\/d\/(.*)\/view/', $url, $matches);
        return $matches[1];
    }
}
