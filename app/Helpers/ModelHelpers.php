<?php

namespace App\Helpers;

use App\Http\Controllers\admin\ManageTaskController;
use App\Http\Controllers\admin\ComputeController;
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
                                ReportController $ReportController)
    {
        $this->controllers = [
            'setting' => $AccountController,
            'video' => $videoController,
            'upload' => $uploadController,
            'support' => $TicketController,
            'manageTask' => $manageTaskController,
            'compute' => $computeController,
            'report' => $ReportController
        ];
    }
    public function loadPage(Request $request){
        $tab = $request->input('tab');
        $page = $request->input('page');
        if ($tab == 'encodingTask') {
            $folder = 'encoder';
        }elseif ($tab == 'transferTask') {
            $folder = 'transfer';
        }else
            $folder = '';
        $user = Auth::user();
        if (strpos($page, 'admin') !== false) {
            switch ($page) {
                case strpos($page, 'manageTask') !== false:
                    $data = $this->controllers['manageTask']->manageControler($request);
                    return view($page.'.'.$tab, $data);
                case strpos($page, 'compute') !== false:
                    $data = $this->controllers['compute']->computeControler($request);
                    return view($page.'.'.$tab, $data);
                default:
                    return view($page.'.'.$tab);
            }
        }else{
            switch ($page) {
                case 'setting':
                    return $this->controllers['setting']->index($tab);
                case 'video':
                    $data = $this->controllers['video']->getVideoData($request);
                    return view('dashboard.'.$page.'.'.$tab, $data);
                case 'upload':
                    return $this->controllers['upload']->upload($tab);
                case 'support':
                    return $this->controllers['support']->ticket($tab);
                case 'report':
                    $data['report'] = $this->controllers['report']->getReport($request);
                    return view('dashboard.'.$page.'.'.$tab, $data);
                default:
                    return view('dashboard.'.$page.'.'.$tab);
            }
        }

    }
}
