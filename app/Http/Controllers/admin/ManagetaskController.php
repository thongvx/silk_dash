<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ManagetaskRepo;

class ManageTaskController extends Controller
{
    protected $manageTaskRepo;

    public function __construct( ManagetaskRepo $manageTaskRepo)
    {
        $this->manageTaskRepo = $manageTaskRepo;
    }
    public function index(Request $request){
        $tab = $request->input('tab', 'encoder');

        $data = [
            'title' => 'Manage Task',
        ];

        if ($tab == 'encodingTask') {
            $data['encoders'] = $this->manageTaskRepo->getAllEncoders('encoder','created_at', 'desc', 20, 'all');
        } else if ($tab == 'transferTask') {
            $data['transfers'] = $this->manageTaskRepo->getAllTransfer('transfer', 'created_at', 'desc', 20);
        }
        return view('admin.manageTask.manageTask', $data);
    }
    public function manageControler(Request $request)
    {
        $tab = $request->input('tab');
        $page = $request->input('page');

        $data = [
            'title' => 'Manage Task',
            'encoders' => $this->manageTaskRepo->getAllEncoders($tab, 'created_at', 'desc', 20, 'all'),
            'transfers' => $this->manageTaskRepo->getAllTransfer($tab, 'created_at', 'desc', 20)
        ];
        return $data;
    }
    public function store(Request $request)
    {
        $tab = request()->get('tab');
        $status = request()->get('status');
        $data = [
            'title' => 'Manage Task',
            'encoders' => $this->manageTaskRepo->getAllEncoders($tab, 'created_at', 'desc', 20, $status)
        ];
        return view('admin.manageTask.encodertaskTable', $data);
    }
}
