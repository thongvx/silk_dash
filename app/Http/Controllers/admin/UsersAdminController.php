<?php

namespace App\Http\Controllers\admin;

use App\Enums\VideoCacheKeys;
use App\Services\StatisticService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Admin\UserRepo;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Repositories\ReportRepo;

class UsersAdminController
{
    protected $userRepo, $accountRepo, $reportRepo;

    public function __construct( UserRepo $userRepo, AccountRepo $accountRepo, ReportRepo $reportRepo)
    {
        $this->userRepo = $userRepo;
        $this->accountRepo = $accountRepo;
        $this->reportRepo = $reportRepo;
    }
    public function index(Request $request)
    {
        $tab = $request->get('tab');
        $limit = $request->get('limit', 20);
        $columns = ['*'];
        $column = $request->get('column', 'created_at');
        $direction = $request->get('direction', 'desc');
        $data = [
            'users' => $this->userRepo->getAllUsers($tab, $column, $direction, $limit, $columns),
            'title' => 'Users',
        ];
        return view('admin.user.user', $data);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $tab = request()->get('tab');
        $data = [
            'users' => $this->userRepo->getAllUsers($tab, 'created_at', 'desc', 20, 20, ['*']),
            'title' => 'Users',
        ];
        return view('admin.user.boxuser', $data);
    }
    private function earningToday($userId, $today){
        $data_setting = $this->accountRepo->getSetting($userId);
        $earning = 0;
        if ($data_setting->earningModes == 1)
            $earning = 0.5;
        if ($data_setting->earningModes == 2)
            $earning = 1;
        $earningToday = StatisticService::calculateValue($userId, $earning, $today);
        return $earningToday;
    }
    public function show($user)
    {
        $today = Carbon::today()->format('Y-m-d');
        $dates = collect(range(0, 15))->map(function($item) use ($today) {
            return Carbon::today()->subDays($item)->format('Y-m-d');
        });
        $dataReport = $this->reportRepo->getAllData($user, 'date', $dates->last(), $dates->first(), 'all');
        $data_today = [];
        $totalViews = Redis::get("total_user_views:{$today}:{$user}") ?? 0;
        $totalImpressionViews = 0;
        $totalImpression1 = Redis::keys("total_impression1:{$today}:{$user}:*");
        $totalImpression2 = Redis::keys("total_impression2:{$today}:{$user}:*");
        foreach ($totalImpression1 as $totalImpression1Key) {
            // Lấy số lượt xem của user từ khóa
            $views = Redis::get($totalImpression1Key);
            // Cộng số lượt xem vào tổng số lượt xem
            $totalImpressionViews += (int)$views;
        }
        foreach ($totalImpression2 as $totalImpression2Key) {
            // Lấy số lượt xem của user từ khóa
            $views = Redis::get($totalImpression2Key);
            // Cộng số lượt xem vào tổng số lượt xem
            $totalImpressionViews += (int)$views;
        }
        $earningToday = $this->earningToday($user, $today);
        $cpm = $totalImpressionViews > 0 ? array_sum($earningToday) / $totalImpressionViews * 1000 : 0;
        $paid_views = $totalImpressionViews;
        $VpnAdsViews = $totalViews - $paid_views;
        $data_today[] = [
            'date' => $today,
            'cpm' => $cpm ,
            'views' => $totalViews,
            'download' => 0,
            'paid_views' => $paid_views,
            'vpn_ads_views' => $VpnAdsViews,
            'revenue' => array_sum($earningToday)
        ];
        $dataReport = collect($this->reportRepo->getAllData($user, 'date', $dates->last(), $dates->first(), 'all'))->map(function ($item) use ($data_today, $today) {
            $item = (object) $item;
            if ($item->date == $today) {
                $item->cpm = $data_today[0]['cpm'];
                $item->views = $data_today[0]['views'];
                $item->download = $data_today[0]['download'];
                $item->paid_views = $data_today[0]['paid_views'];
                $item->vpn_ads_views = $data_today[0]['vpn_ads_views'];
                $item->revenue = $data_today[0]['revenue'];
            }
            return (object) $item;
        });

        $data = [
            'title' => 'User Detail',
            'users' => $this->userRepo->getUserById($user),
            'settings' => $this->accountRepo->getSetting($user),
            'dataReport' => $dataReport,
            'earningToday' => array_sum($earningToday),
            'viewsToday' => $totalViews,
        ];
        return view('admin.user.inforuser', $data);
    }

    public function edit(User $user)
    {
        $data = [
            'user' => $user,
            'title' => 'Edit User',
        ];
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->active = 19;
        $user->save();

        return back()->with('success','User deleted successfully');
    }

    public function loginAs(User $user)
    {

        Auth::login($user);
        return redirect()->route('dashboard');

    }
    public function getDataRedis($slug)
    {
        $data = Redis::get(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug);
        $data = unserialize($data);
        $data = method_exists($data, 'toArray') ? $data->toArray() : (array) $data;

        return json_encode($data);
    }

    public function updateEarning (Request $request)
    {
        $earning = $request->earningModes;
        $updateEarning = $this->accountRepo
                        ->findWhere(['user_id' => $request->userID])
                        ->first()
                        ->update(['earningModes' => $earning]);
        return back()->with('success', 'Earning updated successfully');
    }
    // update user
    public function updateUser(Request $request)
    {
        $user = $this->userRepo->getUserById($request->userID);
        $user->update($request->all());
        return back()->with('success', 'User updated successfully');
    }
    // search user
    public function searchUser(Request $request)
    {
        $limit = $request->get('limit', 20);
        $columns = ['*'];
        $column = $request->get('column', 'created_at');
        $direction = $request->get('direction', 'desc');
        $data = [
            'users' => $this->userRepo->searchUser($request->search, $column, $direction, $limit, $columns),
            'title' => 'Users',
        ];
        return view('admin.user.table', $data);
    }
}
