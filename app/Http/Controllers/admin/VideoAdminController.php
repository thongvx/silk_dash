<?php

namespace App\Http\Controllers\admin;

use App\Enums\VideoCacheKeys;
use App\Repositories\PlayerSettingsRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;
use App\Repositories\Admin\ManagetaskRepo;
use Illuminate\Support\Facades\Redis;

class VideoAdminController extends Controller
{
    protected $videoRepo, $folderRepo, $playerSettingsRepo, $manageTaskRepo;

    public function __construct(VideoRepo $videoRepo, FolderRepo $folderRepo, PlayerSettingsRepo $playerSettingsRepo, ManagetaskRepo $manageTaskRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->folderRepo = $folderRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
        $this->manageTaskRepo = $manageTaskRepo;
    }
    public function index(Request $request)
    {
        $tab = $request->get('tab');
        $limit = $request->get('limit', 20);
        $columns = ['*'];
        $column = $request->get('column', 'created_at');
        $direction = $request->get('direction', 'desc');
        $data = [
            'videos' => $this->videoRepo->getAllVideos($tab, $column, $direction, 20, $limit, ['*']),
            'title' => 'Videos',
        ];
        return view('admin.video.video', $data);
    }

    public function show(Request $request)
    {
        $data = $this->getDataSearch($request);
        return view('admin.video.search', $data);
    }

    public function getDataSearch(Request $request)
    {
        $tab = $request->get('tab');
        $limit = !request()->get('limit') ? 20 : request()->get('limit');
        $searchTerm = $request->input('videoID');
        $column = !request()->get('column') ? 'created_at' : request()->get('column');
        $direction = !request()->get('direction') ? 'desc' : request()->get('direction');
        $videos = $this->videoRepo->searchVideos(null, $searchTerm, $limit, $column, $direction);

        $data = [
            'videos' => $videos,
            'title' => 'Videos',
            'column' => $request->input('column', 'created_at'),
            'direction' => $request->input('direction', 'asc'),
            'searchTerm' => $searchTerm,
        ];
        return $data;
    }
    public function removeCacheVideo($slug)
    {
        Redis::del(VideoCacheKeys::GET_VIDEO_BY_SLUG->value . $slug);
        return redirect()->back();
    }
    public function removeVideo($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        $video->delete();
        return redirect()->back();
    }
    public function infoVideo($slug)
    {
        $video = $this->videoRepo->findVideoBySlug($slug);
        return json_encode($video);
    }
}
