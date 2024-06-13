<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Admin\UserRepo;
use Illuminate\Support\Facades\Auth;

class UsersAdminController
{
    protected $userRepo;

    public function __construct( UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
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
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
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
}
