<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\UserRepo;
use App\Repositories\Admin\ManagetaskRepo;
use App\Repositories\Admin\ComputeRepo;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\b;

class DatatableController
{
    protected $userRepo, $manageTaskRepo, $computeRepo;


    public function __construct( UserRepo $userRepo, ManagetaskRepo $manageTaskRepo, ComputeRepo $computeRepo)
    {
        $this->userRepo = $userRepo;
        $this->manageTaskRepo = $manageTaskRepo;
        $this->computeRepo = $computeRepo;
    }
    public function datatableControl(Request $request)
    {
        $path = request()->get('path');
        $tab = request()->get('tab');
        $data=[];
        $data['limit'] = !request()->get('limit') ? 20 : request()->get('limit');
        $data['column'] = !request()->get('column') ? 'created_at' : request()->get('column');
        $data['direction'] = !request()->get('direction') ? 'desc' : request()->get('direction');
        $status = !request()->get('status')? '' : request()->get('status');
        switch ($path) {
            case '/admin/user':
                $data['users'] = $this->userRepo->getAllUsers($tab, $data['column'], $data['direction'], 20, $data['limit'], ['*']);
                return view('admin.user.table', $data);
            case '/admin/manageTask':
                if ($tab == 'encodingTask') {
                    $data['encoders'] = $this->manageTaskRepo->getAllEncoders($tab,$data['column'], $data['direction'], $data['limit'], $status);
                    return view('admin.manageTask'.'.'.$tab, $data);
                } else if ($tab == 'transferTask') {
                    $data['transfers'] = $this->manageTaskRepo->getAllTransfer($tab, $data['column'], $data['direction'], $data['limit']);
                    return view('admin.manageTask'.'.'.$tab, $data);
                }
                break;
            case '/admin/compute':
                if ($tab == 'encoder') {
                    $data['encoders'] = $this->computeRepo->getAllSvEncoders($data['column'], $data['direction'] , $data['limit']);
                } elseif ($tab == 'storage') {
                    $data['storages'] = $this->computeRepo->getALlSvStorages($data['column'], $data['direction'] , $data['limit']);
                } elseif ($tab == 'stream') {
                    $data['streams'] = $this->computeRepo->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
                } else {
                    $data['encoders'] = $this->computeRepo->getAllSvEncoders($data['column'], $data['direction'], $data['limit']);
                }
                return view('admin.compute'.'.'.$tab, $data);
            default:
                break;
        }
    }
}
