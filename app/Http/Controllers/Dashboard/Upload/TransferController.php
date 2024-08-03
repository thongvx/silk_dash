<?php

namespace App\Http\Controllers\Dashboard\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Repositories\TransferRepo;

class TransferController extends Controller
{
    protected $transferRepo;

    public function __construct(TransferRepo $transferRepo)
    {
        $this->transferRepo = $transferRepo;
    }
    public function index()
    {
        return view('dashboard.upload.transfer.index');
    }
    //-------------------------------update link transfer------------------------------------------
    public function retryTransfer(Request $request)
    {
        $user_id = auth()->id();
        $slug = $request->slug;
        $data = $this->transferRepo->getTransferById($slug);
        $data->status = 0;
        $data->save();
        Redis::setex('transfer'.$user_id.'-'.$slug, 1800, json_encode([
            'slug' => $slug,
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
    public function removeTransfer(Request $request)
    {
        $user_id = auth()->id();
        $slug = $request->slug;
        $data = $this->transferRepo->getTransferById($slug);
        $data->delete();
        Redis::del('transfer'.$user_id.'-'.$slug);
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $data,
        ]);
    }

    public function removeAllTransferFailed()
    {
        $user_id = auth()->id();
        $transfers = $this->transferRepo->query()
            ->where('user_id', $user_id)
            ->where('status', 19)
            ->get();
        foreach ($transfers as $transfer) {
            $transfer->delete();
            Redis::del('transfer'.$user_id.'-'.$transfer->slug);
        }
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $transfers,
        ]);
    }
}
