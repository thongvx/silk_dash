<?php

namespace App\Repositories;

namespace App\Repositories;

use App\Models\Video;
use App\Models\Audio;
use Illuminate\Support\Facades\Redis;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Enums\VideoCacheKeys;

class AudioVideoRepo extends BaseRepository
{
    public function model()
    {
        return Audio::class;
    }
    public  function getAudioVideo($slug)
    {
        $video = json_decode(Redis::get(VideoCacheKeys::GET_AUDIO_BY_SLUG->value . $slug), true);
        if(!$video){
            $video = $this->query()
                ->where('slug', $slug)
                ->get();
            Redis::setex(VideoCacheKeys::GET_AUDIO_BY_SLUG->value . $slug, 259200, json_encode($video));
        }
        return $video;
    }
}
