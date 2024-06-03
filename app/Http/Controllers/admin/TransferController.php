<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\SvEncoder;
use Illuminate\Support\Facades\Redis;

class TransferController extends Controller
{
    //-------------------------------start transfer task-------------------------------------------
    public function startTransferTask()
    {
        $data = Transfer::where('status', 0)->orderBy('priority', 'desc')->first();
        if(!empty($data)){
            //select server transfer
            $domain = SvEncoder::where('active', 1)->where('transfer', '<', 10)->inRandomOrder()->value('name');
            $data->sv_transfer = $domain;
            $data->status = 1;
            $data->save();
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://'.$domain.'.streamsilk.com/insertDataTransfer?user_id='.$data->user_id.'&folder_id='.$data->folder_id.'&slug='.$data->slug.'&url='.$data->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            Redis::set('transfer'.$data->user_id.'-'.$data->slug, json_encode([
                'slug' => $data->slug,
                'url' => $data->url,
                'status' => 1,
                'progress' => 0,
                'size_download' => 0,
                'size' => 0,
            ]));
            return true;
        }
    }
    //-------------------------------update link transfer------------------------------------------
    public function updateLinkTransfer(Request $request)
    {
        $user_id = $request->user_id;
        $slug = $request->slug;
        $progress = $request->progress;
        $size_download = $request->size_download;
        $size = $request->size;
        $url = $request->url;
        Redis::setex('transfer'.$user_id.'-'.$slug, json_encode([
            'slug' => $slug,
            'url' => $url,
            'status' => 1,
            'progress' => $progress,
            'size_download' => $size_download,
            'size' => $size,
        ]), 1800);
    }
    //-------------------------------update failed transfer----------------------------------------
    public function updateFailedTransfer(Request $request)
    {
        $user_id = $request->user_id;
        $slug = $request->slug;
        $data = Transfer::where('user_id', $user_id)->where('slug', $slug)->first();
        $data->status = 19;
        $data->save();
        Redis::setex('transfer'.$user_id.'-'.$slug, json_encode([
            'slug' => $slug,
            'url' => $data->url,
            'status' => 19,
            'progress' => 0,
            'size_download' => 0,
            'size' => 0,
        ]), 1800);
    }

    //=============================================================================================
}
