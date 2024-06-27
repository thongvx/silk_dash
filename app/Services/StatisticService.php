<?php

namespace App\Services;

use App\Models\CountryTier;
use Illuminate\Support\Facades\Redis;

class StatisticService
{
    public static function getAllCountries()
    {
        //Todo: thêm cache ở đây
        $countries = CountryTier::all();
        $countryMap = $countries->pluck('cpm', 'code');
        return $countryMap;
    }

    public static function calculateValue($userId)
    {
        $keys = Redis::keys("total:{$userId}:*");
        $result = [];

        foreach ($keys as $key) {
            $totalViews = Redis::get($key);
            $country = explode(':', $key)[2];

            if (isset(self::getAllCountries()[$country])) {
                $cpm = self::getAllCountries()[$country];
                $revenue = $totalViews * $cpm;

                // Add the revenue to the result array with the country code as the key
                $result[$country] = $revenue;
            }
        }

        return $result;
    }

}
