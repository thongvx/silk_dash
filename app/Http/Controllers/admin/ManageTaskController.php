<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ManagetaskRepo;
use App\Repositories\VideoRepo;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Thêm dòng này

class ManageTaskController extends Controller
{
    protected $manageTaskRepo, $videoRepo;

    public function __construct( ManagetaskRepo $manageTaskRepo, VideoRepo $videoRepo)
    {
        $this->manageTaskRepo = $manageTaskRepo;
        $this->videoRepo = $videoRepo;
    }
    public function index(Request $request){
        $data = $this->manageController($request);
        return view('admin.manageTask.manageTask', $data);
    }
    public function manageController(Request $request)
    {
        $tab = $request->input('tab', 'encoder');
        $status = $request->input('status', 'all');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $data['title'] = 'Manage Task';
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
    //remove the encoder
    public function removeEncoder(Request $request)
    {
        $slugEncoder = $request->input('slugEncoder');
        $encoders = $this->manageTaskRepo->getEncoderBySlug($slugEncoder)->get();
        $video = $this->videoRepo->findVideoBySlug($slugEncoder)->first();
        // Check if the encoder exists
        if ($encoders) {
            // Set the status and storage values to 0
            $subject = 'Encoder Error: ' . $encoders[0]->slug;
            $message = 'An error occurred with the video ID: ' . $encoders[0]->slug . '.';
            Notification::create([
                'user_id' => $encoders[0]->user_id,
                'subject' => $subject,
                'message' => $message,
                'type' => 'encoder',
                'status' => 0
            ]);
            // Delete the encoder
            $this->manageTaskRepo->getEncoderBySlug($slugEncoder)->delete();
            // Delete the video
            $video->delete();
        } else {
            // Throw an exception if the encoder does not exist
            throw new \Exception('Encoder not found');
        }
    }
}
