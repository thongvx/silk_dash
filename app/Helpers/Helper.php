<?php

namespace App\Helpers;

class Helper
{
    public function convertFileSize($sizeInBytes) {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($sizeInBytes > 1024) {
            $sizeInBytes /= 1024;
            $i++;
        }
        return round($sizeInBytes, 2) . ' ' . $units[$i];
    }
}
