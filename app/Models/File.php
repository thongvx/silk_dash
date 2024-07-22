<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    // Other model methods...

    public static function formatSizeUnits($sizeInBytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;
        while ($sizeInBytes > 1024) {
            $sizeInBytes /= 1024;
            $i++;
        }

        return round((float)$sizeInBytes, 2) . ' ' . $units[$i];
    }

    public static function formatNumber($number)
    {
        $units = ['', 'K', 'M', 'B', 'T'];
        $i = 0;
        while ($number > 1000) {
            $number /= 1000;
            $i++;
        }
        return round($number, 2) . ' ' . $units[$i];
    }
}
