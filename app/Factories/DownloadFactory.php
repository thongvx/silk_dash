<?php

namespace App\Factories;

use App\Contracts\DownloadInterface;
use App\Services\Download\GoogleDriverDownload;
use App\Services\Download\OtherLinkDownload;

class DownloadFactory
{
    public static function create($url): DownloadInterface
    {
        if(str_contains($url, 'google.com'))
            return new GoogleDriverDownload($url);
        else
            return new OtherLinkDownload($url);
    }
}
