<?php

namespace App\Repositories\Admin;

use App\Models\CountryStatistic;
use App\Models\ReportData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;


class StatisticRepo extends BaseRepository
{
    public function model()
    {
        return ReportData::class;
    }
    public function getAllData($tab, $startDate, $endDate, $country)
    {
        $reportDatakey = "report_data_admin:{$tab}:{$startDate}:{$endDate}:{$country}";
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        $reportData = Redis::get($reportDatakey);
        if (isset($reportData)&& $reportData !== null) {
            return unserialize($reportData);
        }
        $dates = collect(range($endDate->diffInDays($startDate),0))->map(function($item) use ($startDate) {
            return $startDate->copy()->addDays($item)->format('Y-m-d');
        });
        $reportData = $this->query()->whereBetween('date', [$startDate, $endDate])
                    ->selectRaw('date, sum(cpm) as cpm, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get()
                    ->keyBy('date');
        $reportData = $dates->map(function($date) use ($reportData) {
            return $reportData->get($date, ['date' => $date, 'cpm' => 0, 'views' => 0, 'download' => 0, 'paid_views' => 0, 'vpn_ads_views' => 0, 'revenue' => 0]);
        });
        Redis::setex($reportDatakey, 86400, serialize($reportData));
        return $reportData;
    }

    public function getAllDataCountry($tab,$startDate, $endDate, $countryCode)
    {

        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        $reportKeys = "report_admin:{$startDate}:{$endDate}:{$countryCode}:{$tab}";
        $reportData = Redis::get($reportKeys);
        if (isset($reportData)){
            return unserialize($reportData);
        }
        if ($countryCode !== null) {
            $countryCode = explode(',', $countryCode);
        }

        // Get country name and cpm from all countries data

        $reportData = CountryStatistic::query()
            ->leftJoin('countries', 'country_statistics.country_code', '=', 'countries.code')
            ->when($countryCode, function ($query, $countryCode) {
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
    public function getPayment($userId)
    {
        $paymentkey = "user:{$userId}:payment";
        if(Redis::exists($paymentkey)){
            return unserialize(Redis::get($paymentkey));
        }
        $data = DB::table('payment')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
        Redis::setex($paymentkey, 259200, serialize($data));
        return $data;
    }
}
