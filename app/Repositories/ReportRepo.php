<?php

namespace App\Repositories;

use App\Models\ReportData;
use Carbon\Carbon;

class ReportRepo
{
    public function getAllData($userId, $tab, $startDate, $endDate, $country)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        switch ($tab) {
            case 'date':
                $data = ReportData::where('userid', $userId)
                        ->where('date', '>=', $startDate->format('Y-m-d'))
                        ->where('date', '<=', $endDate->format('Y-m-d'))
                        ->selectRaw('date, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                        ->get();
                break;
            default:
                $data = ReportData::where('userid', $userId)
                    ->when($country, function ($query, $country) {
                        return $query->where('country', $country);
                    })
                    ->where('date', '>=', $startDate->format('Y-m-d'))
                    ->where('date', '<=', $endDate->format('Y-m-d'))
                    ->selectRaw('country, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                    ->groupBy('country')
                    ->orderBy('country', 'desc')
                    ->get();
        }
        return $data;
    }
}
