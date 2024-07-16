<?php

namespace App\Services;

use App\Models\CountryTier;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;

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

    public static function calculateValue($userId, $earning, $today)
    {
        $totalImpression1 = Redis::keys("total_impression1:{$today}:{$userId}:*");
        $totalImpression2 = Redis::keys("total_impression2:{$today}:{$userId}:*");
        $result = [];
        $allCountries = self::getAllCountries();
        if($totalImpression1){
            foreach ($totalImpression1 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                $result[$country] = $revenue*$earning;
            }
        }
        if($totalImpression2){
            foreach ($totalImpression2 as $key) {
                $totalViews = Redis::get($key);
                $country = explode(':', $key)[3];

                $cpm = isset($allCountries[$country]) ? $allCountries[$country] : 0.8;
                $revenue = ($totalViews / 1000) * $cpm;

                // Add the revenue to the result array with the country code as the key
                if(isset($result[$country])){
                    $result[$country] += $revenue*$earning;
                }
                else{
                    $result[$country] = $revenue*$earning;
                }
            }
        }

        return $result;
    }

}
