<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ManagetaskRepo;
use Illuminate\Support\Facades\DB; // Thêm dòng này
use function Laravel\Prompts\table;

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

    public function retryEncoder(Request $request)
    {
        $encoderId = $request->input('encoderId');

        $encoder = DB::table('encoder_task')->where('id', $encoderId)->first();
        // Check if the encoder exists
        if ($encoder) {
            // Set the status and storage values to 0
            DB::table('encoder_task')->where('id', $encoderId)->update([
                'status' => 0,
                'sv_storage' => 0,
                'sv_encoder' => 0
            ]);
        } else {
            // Throw an exception if the encoder does not exist
            throw new \Exception('Encoder not found');
        }
    }
}
