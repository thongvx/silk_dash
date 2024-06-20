<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\UserRepo;
use App\Repositories\Admin\ManagetaskRepo;
use Illuminate\Support\Facades\Auth;
use App\Services\ServerStream\SvStreamService;
use App\Services\ServerStorage\SvStorageService;
use App\Services\ServerEncoder\SvEncoderService;
use App\Http\Controllers\Dashboard\VideoController;

class DatatableController
{
    protected $userRepo, $manageTaskRepo, $svStreamService, $svStorageService, $svEncoderService, $videoController;


    public function __construct( UserRepo $userRepo, ManagetaskRepo $manageTaskRepo, SvStreamService $svStreamService,
                                 SvStorageService $svStorageService, SvEncoderService $svEncoderService, VideoController $videoController)
    {
        $this->userRepo = $userRepo;
        $this->manageTaskRepo = $manageTaskRepo;
        $this->svStreamService = $svStreamService;
        $this->svStorageService = $svStorageService;
        $this->svEncoderService = $svEncoderService;
        $this->videoController = $videoController;
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
                    $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction'] , $data['limit']);
                } elseif ($tab == 'storage') {
                    $data['storages'] = $this->svStorageService->getALlSvStorages($data['column'], $data['direction'] , $data['limit']);
                } elseif ($tab == 'stream') {
                    $data['streams'] = $this->svStreamService->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
                } else {
                    $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction'], $data['limit']);
                }
                return view('admin.compute'.'.'.$tab, $data);
            case '/video':
                return $this->videoController->control($request);
            default:
                break;
        }
    }
}
