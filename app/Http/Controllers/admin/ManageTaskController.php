<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Repositories\Admin\ManagetaskRepo;
use App\Repositories\VideoRepo;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

// Thêm dòng này

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
        $column = $request->input('column', 'updated_at');
        $direction = $request->input('direction', 'desc');
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
        $encoders = $this->manageTaskRepo->getEncoderBySlug($slugEncoder);
        $video = $this->videoRepo->findVideoBySlug($slugEncoder);
        // Check if the encoder exists
        if ($encoders) {
            // Set the status and storage values to 0
            $subject = 'Encoder Error: ' . $encoders->slug;
            $message = 'An error occurred with the video ID: ' . $encoders->slug. ' "' . $encoders->title. '"'. '.' . "\n"
                        . 'The video has been removed from the encoder queue. Please upload your video again.';
            Notification::create([
                'user_id' => $encoders->user_id,
                'subject' => $subject,
                'message' => $message,
                'type' => 'error',
                'status' => 0
            ]);
            // Delete the encoder
            $this->manageTaskRepo->deleteEncoder($slugEncoder);
            // Delete the video
            if($video){
                $video->first()->delete();
            }
        } else {
            // Throw an exception if the encoder does not exist
            throw new \Exception('Encoder not found');
        }
    }
    // retry transfer task
    public function retryTransferTask(Request $request)
    {
        $transferId = $request->transferId;
        $data = Transfer::query()->find($transferId);
        $data->status = 0;
        $data->save();
        Redis::setex('transfer'.$data->user_id.'-'.$data->slug, 1800, json_encode([
            'slug' => $data->slug,
            'url' => $data->url,
            'status' => 0,
            'progress' => 0,
            'size_download' => 0,
            'size' => 0,
        ]));
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }

    //remove transfer task
    public function removeTransferTask(Request $request)
    {
        $transferId = $request->transferId;
        $data = Transfer::query()->find($transferId);
        if ($data) {
            $data->delete();
            Redis::del('transfer' . $data->user_id . '-' . $data->slug);
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transfer task not found',
            ]);
        }
    }
    //search encoder
    public function searchEncoder(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'created_at');
        $direction = $request->input('direction', 'asc');
        $limit = $request->input('limit', 20);
        $status = $request->input('status', 'all');
        $data['encoders'] = $this->manageTaskRepo->searchEncoder($search, $column, $direction, $limit,$status,'*');
        return view('admin.manageTask.tableEncoder', $data);
    }
}
