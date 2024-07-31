<?php

namespace App\Helpers;

use App\Http\Controllers\admin\EmailAdminController;
use App\Http\Controllers\admin\ManageTaskController;
use App\Http\Controllers\admin\ComputeController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\VideoAdminController;
use App\Http\Controllers\Dashboard\Setting\AccountController;
use App\Http\Controllers\Dashboard\Support\TicketController;
use App\Http\Controllers\Dashboard\UploadController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\Dashboard\Report\ReportController;
use App\Repositories\FolderRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ModelHelpers
{
    protected $controllers;

    public function __construct(VideoController $videoController, AccountController $AccountController, UploadController $uploadController,
                                TicketController $TicketController, ManageTaskController $manageTaskController, ComputeController $computeController,
                                ReportController $ReportController, StatisticController $statisticController, VideoAdminController $videoAdminController,
                                EmailAdminController $emailAdminController)
    {
        $this->controllers = [
            'setting' => $AccountController,
            'video' => $videoController,
            'upload' => $uploadController,
            'support' => $TicketController,
            'manageTask' => $manageTaskController,
            'compute' => $computeController,
            'report' => $ReportController,
            'statistic' => $statisticController,
            'videoAdmin' => $videoAdminController,
            'emailAdmin' => $emailAdminController
        ];
    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');
        $user = Auth::user();
        $pageToMethodMap = [
            'admin/manageTask' => [
                'role'=> 'admin',
                'controller' => 'manageTask',
                'method' => 'manageController'
            ],
            'admin/statistic' => [
                'role'=> 'admin',
                'controller' => 'statistic',
                'method' => 'statisticController'
            ],
            'admin/compute' => [
                'role'=> 'admin',
                'controller' => 'compute',
                'method' => 'computeController'
            ],
            'admin/mail' => [
                'role'=> 'admin',
                'controller' => 'emailAdmin',
                'method' => 'emailController'
            ],
            'admin/users' => null, // No controller method to call, directly render view
            'setting' => [
                'role'=> 'user',
                'controller' => 'setting',
                'method' => 'index'],
            'video' => [
                'role'=> 'user',
                'controller' => 'video',
                'method' => 'getVideoData'
            ],
            'upload' => [
                'role'=> 'user',
                'controller' => 'upload',
                'method' => 'upload'
            ],
            'support' => [
                'role'=> 'user',
                'controller' => 'support',
                'method' => 'ticket'
            ],
        ];

        if (array_key_exists($page, $pageToMethodMap)) {
            $mapping = $pageToMethodMap[$page];
            $basePath = $mapping['role'] == 'admin' ? '' : 'dashboard.';
            if ($mapping) {
                $controller = $this->controllers[$mapping['controller']];
                $method = $mapping['method'];
                $data = $controller->$method($request);
                return view($basePath.$page.'.'.$tab, $data);
            } else {
                return view($basePath.$page.'.'.$tab);
            }
        }else{
            return response()->view('errors.404', [], 404);
        }
    }

}
