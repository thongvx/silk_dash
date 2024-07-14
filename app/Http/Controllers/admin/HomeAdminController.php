<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dashboard\VideoController;
use Carbon\Carbon;


class HomeAdminController extends Controller
{
    protected $videoController;

    public function __construct(VideoController $videoController)
    {
        $this->videoController = $videoController;
    }
    public function index(){
        $today = Carbon::today()->format('Y-m-d');
        $keys = redis::keys("total:{$today}:*");
        $totalWatching = 0 ;
        $earningToday = 0;
        $countryViewsKeys = Redis::keys("user:*:country_views");
        foreach ($countryViewsKeys as $countryViewsKey) {
            $countries = Redis::zrange($countryViewsKey, 0, -1);
            foreach ($countries as $country) {
                $views = Redis::zscore($countryViewsKey, $country);
                $earningToday += $views;
            }
        }
        foreach ($keys as $key) {
            // Get the value of the key and add it to the total
            $value = redis::get($key);
            $totalWatching += $value;
        }
        $data =[
            'title' => 'Dashboard',
            'userWatching' => $totalWatching,
            'storage' => $this->videoController->convertFileSize(DB::table('users')->sum('storage')),
            'users' => DB::table('users')->count(),
            'todayEarning' => $earningToday,
            'totalBalance' => DB::table('payment')->sum('amount'),
        ];

        return view('admin.index', $data);
    }
}
