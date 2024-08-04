<?php

namespace App\Http\Controllers\admin;

use App\Enums\VideoCacheKeys;
use App\Http\Controllers\Controller;
use App\Models\SvStorage;
use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Video;
use App\Jobs\CreatAudioJob;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class AudioController extends Controller
{
    //-----------------------------upload audio----------------------------------------------------------------------
    function uploadAudio(Request $request)
    {
        $slug = $request->slug;
        $language = $request->language;
        $sv = $request->sv;
        $data = [
            'status' => 0,
            'slug' => $slug,
            'language' => $language,
            'path' => '0',
            'sv_encoder' => $sv,
        ];
        $check = Audio::where('slug', $slug)->where('language', $language)->first();
        if(empty($check)){
            $video = Audio::create($data);
        }
        else{
            $check->status = 0;
            $check->save();
        }
        return true;
    }
    //-----------------------------start copy audio------------------------------------------------------------------
    function startCopyAudio()
    {
        $data = Audio::where('status', 0)->first();
        if($data){
            $data->increment('status');
            $svStorage = SvStorage::where('active', 1)->where('in_data', 1)->where('percent_space', '<', 96)->where('out_speed', '<', 900)->inRandomOrder()->first();
            Queue::push(new CreatAudioJob($data->slug, $svStorage->name, $data->language, $data->sv_encoder));
            $data->increment('status');
        }
    }
    //-----------------------------finish copy audio----------------------------------------------------------------
    function finishCopyAudio(Request $request)
    {
        $slug = $request->slug;
        $language = $request->language;
        $data = Audio::where('slug', $slug)->where('language', $language)->first();
        if ($data) {
            $data->status = 4;
            $data->path = $request->path;
            $data->save();

            $dataVideo['audio'] = 1;
            Video::where('slug', $slug)->update($dataVideo);
            Redis::del(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug);
        }
    }
    //===============================================================================================================
}
