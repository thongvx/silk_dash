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

    public static function calculateValue($userId, $earning, $today)
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
                $result[$country] = $revenue * $earning;
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
                    $result[$country] += $revenue * $earning;
                } else {
                    $result[$country] = $revenue * $earning;
                }
            }
        }

        return $result;
    }

    public function calculateTotalEarnings($today)
    {
        // In the `StatisticService` class
        $totalEarnings = 0;
        $key = "all_users";
        $allUsers = Redis::get($key);
        if (isset($allUsers)) {
            $userIds = unserialize($allUsers);
        } else {
            $userIds = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })->pluck('id');
            Redis::set($key, serialize($userIds));
        }

        $settings = $this->accountRepo->getSettingsByUserIds($userIds);

        // Convert settings to a key-value array for quick access
        $settingsMap = $settings->keyBy('user_id');
        foreach ($userIds as $userId) {
            $data_setting = $settingsMap->get($userId);
            $earning = 0;

            if ($data_setting !== null) {
                if ($data_setting->earningModes == 1) {
                    $earning = 0.5;
                } elseif ($data_setting->earningModes == 2) {
                    $earning = 1;
                }
            }

            $userEarnings = $this->calculateValue($userId, $earning, $today);
            $totalEarnings += array_sum($userEarnings);
        }

        return $totalEarnings;
    }
}
