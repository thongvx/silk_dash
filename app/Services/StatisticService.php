<?php

namespace App\Services;

use App\Models\CountryTier;
use Illuminate\Support\Facades\Redis;

class StatisticService
{
    public static function getAllCountries()
    {
        $countriesKey = 'countries';
        $countryMap = Redis::get($countriesKey);
        if (isset($countryMap) && $countryMap !== null) {
            return unserialize($countryMap);
        }
        $countries = CountryTier::all();
        Redis::set('allCountries', serialize($countries));
        $countryMap = $countries->pluck('cpm', 'code');
        Redis::set($countriesKey, serialize($countryMap));
        return $countryMap;
    }

    public static function calculateValue($userId)
    {
        $keys = Redis::keys("total:{$userId}:*");
        $result = [];
        $allCountries = self::getAllCountries();

        foreach ($keys as $key) {
            $totalViews = Redis::get($key);
            $country = explode(':', $key)[2];

            $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
            $revenue = ($totalViews / 1000) * $cpm;

            // Add the revenue to the result array with the country code as the key
            $result[$country] = $revenue;
        }

        return $result;
    }

}
