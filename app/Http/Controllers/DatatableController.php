<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Admin\UserRepo;
use Illuminate\Support\Facades\Auth;

class DatatableController
{
    protected $userRepo;

    public function __construct( UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function datatableControl(Request $request)
    {
        $path = request()->path();
        $page = request()->get('page', 1);
        $tab = request()->get('tab');
        $limit = request()->get('limit', 20);
        $column = request()->get('column', 'created_at');
        $direction = request()->get('direction', 'desc');
        if(strpos($path,'/admin/user') !== false){
            $data = [
                'users' => $this->userRepo->getAllUsers($tab, $column, $direction, $limit, $page),
            ];
        }
        return view('admin.user.table', $data);
    }
}
