<?php

namespace App\Helpers;

use App\Http\Controllers\admin\ManageTaskController;
use App\Http\Controllers\admin\ComputeController;
use App\Http\Controllers\Admin\StatisticController;
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
                                ReportController $ReportController, StatisticController $statisticController)
    {
        $this->controllers = [
            'setting' => $AccountController,
            'video' => $videoController,
            'upload' => $uploadController,
            'support' => $TicketController,
            'manageTask' => $manageTaskController,
            'compute' => $computeController,
            'report' => $ReportController,
            'statistic' => $statisticController
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
                'method' => 'manageControler'
            ],
            'admin/statistic' => [
                'role'=> 'admin',
                'controller' => 'statistic',
                'method' => 'statisticControler'
            ],
            'admin/compute' => [
                'role'=> 'admin',
                'controller' => 'compute',
                'method' => 'computeControler'
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
            'report' => [
                'role'=> 'user',
                'controller' => 'report',
                'method' => 'store'
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
        }
    }

}
