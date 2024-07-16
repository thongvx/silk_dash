<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\ServerStream\SvStreamService;
use Illuminate\Support\Facades\Redis;


class StatisticController extends Controller
{
    protected $svStreamService;

    public function __construct(SvStreamService $svStreamService)
    {
        $this->svStreamService = $svStreamService;
    }

    private function getData( Request $request, $tab){
        $data['title'] = 'Statistic';
        $data['column'] = $request->input('column', 'created_at');
        $data['direction'] = $request->input('direction', 'asc');
        $data['limit'] = $request->input('limit', 20);
        if ($tab == 'user') {
            $data['topUsers'] = $this->dataUser();
        }elseif ($tab == 'stream') {
            $data['streams'] = $this->svStreamService->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['streams']->total() ?? 0;

        } else{
            $data['topUsers'] = $this->dataUser();
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

    public function statisticControler(Request $request)
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
