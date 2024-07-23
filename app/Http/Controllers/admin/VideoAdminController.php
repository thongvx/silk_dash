<?php

namespace App\Http\Controllers\admin;

use App\Repositories\PlayerSettingsRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VideoRepo;
use App\Repositories\FolderRepo;

class VideoAdminController extends Controller
{
    protected $videoRepo, $folderRepo, $playerSettingsRepo;

    public function __construct(VideoRepo $videoRepo, FolderRepo $folderRepo, PlayerSettingsRepo $playerSettingsRepo)
    {
        $this->videoRepo = $videoRepo;
        $this->folderRepo = $folderRepo;
        $this->playerSettingsRepo = $playerSettingsRepo;
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
}
