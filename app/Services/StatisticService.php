<?php

namespace App\Services;

use App\Models\CountryTier;
use App\Models\User;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Redis;

class StatisticService
{
    protected AccountRepo $accountRepo;

    public function __construct(AccountRepo $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }

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

    public static function calculateValue($userId, $today)
    {
        $totalImpression1 = Redis::keys("total_impression1:{$today}:{$userId}:*");
        $totalImpression2 = Redis::keys("total_impression2:{$today}:{$userId}:*");
        $result = [];
        $allCountries = self::getAllCountries();
        if ($totalImpression1) {
            foreach ($totalImpression1 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                $result[$country] = $revenue * 0.5;
            }
        }
        if ($totalImpression2) {
            foreach ($totalImpression2 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                if (isset($result[$country])) {
                    $result[$country] += $revenue;
                } else {
                    $result[$country] = $revenue;
                }
            }
        }

        return $result;
    }

    public function calculateTotalEarnings($today)
    {
        // In the `StatisticService` class
        $totalImpression1 = Redis::keys("total_impression1:{$today}:*:*");
        $totalImpression2 = Redis::keys("total_impression2:{$today}:*:*");
        $result = [];
        $allCountries = self::getAllCountries();
        if ($totalImpression1) {
            foreach ($totalImpression1 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                $result[$country] = $revenue * 0.5;
            }
        }

        if ($totalImpression2) {
            foreach ($totalImpression2 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                if (isset($result[$country])) {
                    $result[$country] += $revenue;
                } else {
                    $result[$country] = $revenue;
                }
            }
        }
        $totalEarnings = array_sum($result);
        return $totalEarnings;
    }
}
