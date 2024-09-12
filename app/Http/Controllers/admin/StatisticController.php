<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CountryTier;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Redis;
use App\Repositories\ReportRepo;


class StatisticController extends Controller
{
    protected $svStreamService;
    protected $reportRepo;

    public function __construct(SvStreamService $svStreamService, ReportRepo $reportRepo)
    {
        $this->svStreamService = $svStreamService;
        $this->reportRepo = $reportRepo;
    }
    private function getDateRange($date,$today, $request)
    {
        switch ($date)
        {
            case 'yesterday':
                $startDate = $endDate = Carbon::yesterday();
                break;
            case 'week':
                $startDate = Carbon::today()->subWeek();
                $endDate = Carbon::today();
                break;
            case 'month':
                $startDate = Carbon::today()->subMonth();
                $endDate = Carbon::today();
                break;
            default:
                $startDate = $request->input('startDate', Carbon::today()->subWeek());
                $endDate = $request->input('endDate', Carbon::yesterday());
        }
        if($date == 'today'){
            $data['startDate'] = $data['endDate'] = date("m/d/Y", strtotime($today));
        } else{
            $data['startDate'] = date("m/d/Y", strtotime($startDate));
            $data['endDate'] = date("m/d/Y", strtotime($endDate));
        }
        return $data;
    }
    private function country($country){
        $data['countries'] = is_string($country) ? explode(',', $country) : [];
        $data['AllCountries'] = Redis::get('allCountries') ;
        if (isset($data['AllCountries'])){
            $data['AllCountries'] = unserialize($data['AllCountries']);
        }else{
            $data['AllCountries'] = CountryTier::all();
            Redis::set('allCountries', serialize(CountryTier::all()));
        }
        return $data;
    }

    private function getData( Request $request, $tab){
        $date = $request->input('date');
        $country = $request->input('country', null);
        $data['title'] = 'Statistic';
        $data['column'] = $request->input('column', 'created_at');
        $data['direction'] = $request->input('direction', 'asc');
        $data['limit'] = $request->input('limit', 20);
        $today = Carbon::today()->format('Y-m-d');
        $cacheKey = "total_balance:{$today}";
        $data['totalBalance'] = Redis::get($cacheKey);
        $data['totalWithdrawals'] = Payment::sum('amount');
        $data = array_merge($data, self::getDateRange($date, $today, $request));
        $data = array_merge($data, self::country($country));
        if (!$data['totalBalance']) {
            $data['totalBalance'] = $this->reportRepo->sum('revenue') - $data['totalWithdrawals'];
            Redis::setex($cacheKey, 43200, $data['totalBalance']); // Cache for 12 hours
        } else {
            $data['totalBalance'] = floatval($data['totalBalance']);
        }

        return $data;
    }
    public function index( Request $request )
    {
        $tab = $request->input('tab', 'user');
        $data = $this->getData($request, $tab);
        // Get the total number of transfers
        return view('admin.statistic.statistic', $data);
    }

    public function statisticController(Request $request)
    {
        $tab = $request->input('tab');
        return $this->getData($request, $tab);
    }
    private function dataUser(){
        $today = Carbon::today()->format('Y-m-d');
        $allKeys = Redis::keys("total_user_views:{$today}:*");
        $scores = [];

        foreach ($allKeys as $key) {
            $userId = explode(':', $key)[2];
            $scores[str_replace("total_user_views:{$today}:", '', $key)] = [
                'views' => Redis::get($key) ?? 0,
                'name' => User::find($userId)->name,
            ];
        }
        arsort($scores);
        $topUsers = array_slice($scores, 0, 10, true);

        return $topUsers;
    }
}
