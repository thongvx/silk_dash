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
        $data['title'] = 'Manage Task';
        $status = $request->input('status', 'all');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'desc');
        if ($tab == 'encodingTask') {
            $data['encoders'] = $this->manageTaskRepo->getAllEncoders('encoder',$column, $direction , 20, $status);
        } else{
            $data['transfers'] = $this->manageTaskRepo->getAllTransfer('transfer', $column, $direction , 20);
        }
        return view('admin.manageTask.manageTask', $data);
    }
    public function manageControler(Request $request)
    {
        $tab = $request->input('tab');
        $data['title'] = 'Manage Task';
        $status = $request->input('status', 'all');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'desc');
        if ($tab == 'encodingTask') {
            $data['encoders'] = $this->manageTaskRepo->getAllEncoders('encoder',$column, $direction , 20, $status);
        } else{
            $data['transfers'] = $this->manageTaskRepo->getAllTransfer('transfer', $column, $direction , 20);
        }
        return $data;
    }
}
