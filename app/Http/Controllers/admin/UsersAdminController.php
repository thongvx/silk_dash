<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Admin\UserRepo;
use App\Repositories\AccountRepo;
use Illuminate\Support\Facades\Auth;

class UsersAdminController
{
    protected $userRepo, $accountRepo;

    public function __construct( UserRepo $userRepo, AccountRepo $accountRepo)
    {
        $this->userRepo = $userRepo;
        $this->accountRepo = $accountRepo;
    }
    public function index(Request $request)
    {
        $tab = request()->get('tab');
        $data = [
            'users' => $this->userRepo->getAllUsers($tab, 'created_at', 'desc', 20, 15, ['*']),
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
            'users' => $this->userRepo->getAllUsers($tab, 'created_at', 'desc', 20, 15, ['*']),
            'title' => 'Users',
        ];
        return view('admin.user.boxuser', $data);
    }
    public function show($user)
    {
        $data = [
            'title' => 'User Detail',
            'users' => $this->userRepo->getUserById($user),
            'settings' => $this->accountRepo->getSetting($user),
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
}
