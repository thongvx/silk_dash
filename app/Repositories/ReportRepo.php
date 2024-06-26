<?php

namespace App\Repositories;

use App\Models\ReportData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;


class ReportRepo extends BaseRepository
{
    public function model()
    {
        return ReportData::class;
    }
    public function getAllData($userId, $tab, $startDate, $endDate, $country)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        $reportDatakey = "user:{$userId}:report_data:{$tab}:{$startDate->format('Y-m-d')}:{$endDate->format('Y-m-d')}:{$country}";
        $reportData = Redis::get($reportDatakey);
        if (isset($reportData)&&$reportData !== null) {
            return unserialize($reportData);
        }
        switch ($tab) {
            case 'date':
                $dates = collect(range($endDate->diffInDays($startDate),0))->map(function($item) use ($startDate) {
                    return $startDate->copy()->addDays($item)->format('Y-m-d');
                });

                $reportData = $this->query()->where('user_id', $userId)
                    ->whereIn('date', $dates)
                    ->selectRaw('date, sum(cpm) as cpm, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                    ->groupBy('date')
                    ->orderBy('date', 'desc')
                    ->get()
                    ->keyBy('date');
                $reportData = $dates->map(function($date) use ($reportData) {
                    return $reportData->get($date, ['date' => $date, 'cpm' => 0, 'views' => 0, 'download' => 0, 'paid_views' => 0, 'vpn_ads_views' => 0, 'revenue' => 0]);
                });
                break;
            default:
                $reportData = $this->query()->where('user_id', $userId)
                    ->when($country, function ($query, $country) {
                        return $query->where('country', $country);
                    })
                    ->where('date', '>=', $startDate->format('Y-m-d'))
                    ->where('date', '<=', $endDate->format('Y-m-d'))
                    ->selectRaw('country, sum(cpm) as cpm, sum(views) as views, sum(download) as download, sum(paid_views) as paid_views, sum(vpn_ads_views) as vpn_ads_views, sum(revenue) as revenue')
                    ->groupBy('country')
                    ->orderBy('country', 'desc')
                    ->get();
        }
        Redis::setex($reportDatakey, 259200, serialize($reportData));
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
