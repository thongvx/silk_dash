<?php

namespace App\Repositories;

use App\Models\UserData;
use Carbon\Carbon;

class ReportRepo
{
    public function getAllData($userId, $tab, $startDate, $endDate, $country)
    {
        switch ($tab) {
            case 'date-table':
                $data = UserData::where('userid', $userId)
                        ->where('date', '<=', $startDate)
                        ->where('date', '>=', $endDate)
                        ->selectRaw('date, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                        ->groupBy('date')
                        ->orderBy('date', 'desc')
                        ->get();
                break;
            default:
                $data = UserData::where('userid', $userId)
                    ->when($country, function ($query, $country) {
                        return $query->where('country', $country);
                    })
                    ->where('date', '>=', $startDate)
                    ->where('date', '<=', $endDate)
                    ->selectRaw('country, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                    ->groupBy('country')
                    ->orderBy('country', 'desc')
                    ->get();
        }
        return $data;
    }
}
