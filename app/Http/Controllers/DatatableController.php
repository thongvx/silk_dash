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
use App\Http\Controllers\admin\VideoAdminController;

class DatatableController
{
    protected $userRepo, $manageTaskRepo, $svStreamService, $svStorageService,
            $svEncoderService, $videoController, $adminVideoSearch;


    public function __construct( UserRepo $userRepo, ManagetaskRepo $manageTaskRepo, SvStreamService $svStreamService,
                                 SvStorageService $svStorageService, SvEncoderService $svEncoderService, VideoController $videoController,
                                 VideoAdminController $adminVideoSearch)
    {
        $this->userRepo = $userRepo;
        $this->manageTaskRepo = $manageTaskRepo;
        $this->svStreamService = $svStreamService;
        $this->svStorageService = $svStorageService;
        $this->svEncoderService = $svEncoderService;
        $this->videoController = $videoController;
        $this->adminVideoSearch = $adminVideoSearch;
    }
    public function datatableControl(Request $request)
    {
        $path = request()->get('path');
        $tab = request()->get('tab');
        $data=[];
        $data['limit'] = request()->get('limit') ?? 20;
        $data['column'] = request()->get('column') ?? 'created_at';
        $data['direction'] = request()->get('direction') ?? 'desc';
        $status = request()->get('status') ?? '';
        switch ($path) {
            case '/admin/user':
                if($request->get('search')){
                    $data['users'] = $this->userRepo->searchUser($request->search, $data['column'], $data['direction'], 20, ['*']);
                } else{
                    $data['users'] = $this->userRepo->getAllUsers($tab, $data['column'], $data['direction'], 20, $data['limit'], ['*']);
                }
                return view('admin.user.table', $data);
            case '/admin/manageTask':
                if ($tab == 'encodingTask') {
                    if($request->get('search')){
                        $data['encoders'] = $this->manageTaskRepo->searchEncoder($request->search, $data['column'], $data['direction'], $data['limit'], $status, ['*']);
                    } else{
                        $data['encoders'] = $this->manageTaskRepo->getAllEncoders($tab,$data['column'], $data['direction'], $data['limit'], $status);
                    }
                } else if ($tab == 'transferTask') {
                    $data['transfers'] = $this->manageTaskRepo->getAllTransfer($tab, $data['column'], $data['direction'], $data['limit']);
                }
                return view('admin.manageTask'.'.'.$tab, $data);
            case '/admin/compute':
                $data['direction-compute'] = request()->get('direction') ?? 'asc';
                if ($tab == 'encoder') {
                    $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction-compute'] , $data['limit']);
                } elseif ($tab == 'storage') {
                    $data['storages'] = $this->svStorageService->getALlSvStorages($data['column'], $data['direction-compute'] , $data['limit']);
                } elseif ($tab == 'stream') {
                    $data['streams'] = $this->svStreamService->getAllSvStreams($data['column'], $data['direction-compute'] , $data['limit']);
                } else {
                    $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction-compute'], $data['limit']);
                }
                return view('admin.compute'.'.'.$tab, $data);
            case '/admin/videoAdmin/search':
                $data = $this->adminVideoSearch->getDataSearch($request);
                return view('admin.video.table', $data);
            case '/video':
                return $this->videoController->control($request);
            default:
                break;
        }
    }
}
