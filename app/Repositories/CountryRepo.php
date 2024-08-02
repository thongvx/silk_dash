<?php

namespace App\Repositories;

use App\Models\CountryStatistic;
use Prettus\Repository\Eloquent\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class CountryRepo extends BaseRepository
{
    public function model()
    {
        return CountryStatistic::class;
    }

    public function getAllDataCountry($tab,$startDate, $endDate,$userId, $countryCode)
    {

        $startDate = Carbon::parse($startDate)->format('Y-m-d');
        $endDate = Carbon::parse($endDate)->format('Y-m-d');
        $reportKeys = "user:{$userId}:report:{$startDate}:{$endDate}:{$countryCode}:{$tab}";
        $reportData = Redis::get($reportKeys);
        if (isset($reportData)){
            return unserialize($reportData);
        }
        if($countryCode == null){
            $countryCode = null;
        } else{
            $countryCode = explode(',', $countryCode);
        }

        // Get country name and cpm from all countries data

        $reportData = $this->model
                    ->leftJoin('countries', 'country_statistics.country_code', '=', 'countries.code')
                    ->where('country_statistics.user_id', $userId)
                    ->when($countryCode , function ($query, $countryCode) {
                        return $query->whereIn('country_statistics.country_code', $countryCode);
                    })
                    ->whereBetween('country_statistics.date', [$startDate, $endDate]);

        if ($tab == 'date') {
            $reportData = $reportData->selectRaw('sum(country_statistics.views) as views,
                                                sum(country_statistics.download) as download,
                                                sum(country_statistics.paid_views) as paid_views,
                                                sum(country_statistics.vpn_ads_views) as vpn_ads_views,
                                                sum(country_statistics.revenue) as revenue,
                                                countries.name as country_name,
                                                country_statistics.date as date,
                                                avg(countries.cpm) as cpm')
                ->groupBy('country_statistics.date','countries.name')
                ->get();
        } elseif ($tab == 'country') {
            $reportData = $reportData->selectRaw('sum(country_statistics.views) as views,
                                                sum(country_statistics.download) as download,
                                                sum(country_statistics.paid_views) as paid_views,
                                                sum(country_statistics.vpn_ads_views) as vpn_ads_views,
                                                sum(country_statistics.revenue) as revenue,
                                                countries.name as country_name,
                                                countries.cpm as cpm')
                ->groupBy('countries.name', 'countries.cpm')
                ->get();
        }
        Redis::setex($reportKeys, 259200, serialize($reportData));
        return $reportData;
    }
}
