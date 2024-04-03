<?php

namespace App\Http\Controllers\Dashboard;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UploadController
{
    //Trả về giao diện upload
    public function upload(Request $request){
        $data['title'] = 'Upload';
        return view('dashboard.upload', $data);
    }

    //Xử lý gọi vào hàm này để đẩy videos lên
    public function uploadVideo(Request $request){
        //Kiểm tra xem có đang phải là một tiến trình mới hay không nếu có thì mới chọn lại con server
        //Dựa trên file băm - có thuộc tính gì đó của thằng file gốc
        $thuocTinhFilegoc = 'abcdef';
        if (Redis::setnx($thuocTinhFilegoc)){
            //Todo: Thêm redis exprire cho nó sau 30p 1 tiếng


            //Todo: Lấy danh sach các server có thể upload
            $serverUploads = [];

            //Cờ để lấy server
            $keyToGet = Redis::get('keyToGet');
            if (!isset($keyToGet)){
                $keyToGet = 0;
                Redis::set('keyToGet', $keyToGet);
            }


            //Gắn lại lại cờ
            $keyToGet = $keyToGet + 1;
            if ($keyToGet >= count($serverUploads)){
                $keyToGet = 0;
            }
            Redis::set('keyToGet', $keyToGet);
        }

        $choiceServer = $serverUploads[$keyToGet];

        //Todo: Xử lý upload lên con choise server được chọn
        //Forward Request $request to server được chon


    }

}
