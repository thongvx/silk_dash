<?php

namespace App\Repositories;

class CustomAdsRepo
{
    public function getCustomAds($userId)
    {
        $filePath = 'customAds/' . $userId . '.json';
        if (file_exists($filePath)) {
            $data = file_get_contents($filePath);
            return json_decode($data, true);
        }
        return [];
    }

}
