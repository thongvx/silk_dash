<?php

namespace App\Http\Controllers\admin;

use App\Enums\VideoCacheKeys;
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
            'users' => $this->userRepo->getAllUsers($tab, $column, $direction, 20, $limit, ['*']),
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
    public function show($user)
    {
        $today = Carbon::today()->format('Y-m-d');
        $dates = collect(range(0, 15))->map(function($item) use ($today) {
            return Carbon::today()->subDays($item)->format('Y-m-d');
        });
        $viewsData = $this->reportRepo
            ->where('user_id', $user)
            ->whereIn('date', $dates)
            ->selectRaw('date, sum(views) as views')
            ->groupBy('date')
            ->get();
        $totalViewsDay = 0;
        $totalViewsKey = Redis::keys("total_user_views:{$today}:*");
        foreach ($totalViewsKey as $key) {
            $totalViewsDay += Redis::get($key) ?? 0;
        }
        // Process views data for month and week
        $allDatesWithDefaults = $dates->mapWithKeys(function($date) {
            return [$date => 0];
        });

        // Update with actual views data where available
        $processedViewsData = $allDatesWithDefaults->merge($viewsData->mapWithKeys(function($item) {
            return [$item->date => $item->views];
        }));
        $processedViewsData->put($today, $totalViewsDay);

        $data = [
            'title' => 'User Detail',
            'users' => $this->userRepo->getUserById($user),
            'settings' => $this->accountRepo->getSetting($user),
            'viewDate' => $processedViewsData->values(),
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
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function loginAs(User $user)
    {
        if (Auth::user()->hasRole('admin')) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            abort(403);
        }
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
}
