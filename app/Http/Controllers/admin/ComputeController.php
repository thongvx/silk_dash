<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ServerStream\SvStreamService;
use App\Services\ServerStorage\SvStorageService;
use App\Services\ServerEncoder\SvEncoderService;
use App\Services\ServerDownload\SvDownloadService;

class ComputeController extends Controller
{
    protected $svStreamService, $svStorageService, $svEncoderService, $svDownloadService;

    public function __construct( SvStreamService $svStreamService, SvStorageService $svStorageService,
                                 SvEncoderService $svEncoderService, SvDownloadService $svDownloadService)
    {
        $this->svStreamService = $svStreamService;
        $this->svStorageService = $svStorageService;
        $this->svEncoderService = $svEncoderService;
        $this->svDownloadService = $svDownloadService;
    }

    private function getData(Request $request, string $tab)
    {
        $data['column'] = $request->input('column', 'name');
        $data['direction'] = $request->input('direction', 'asc');
        $data['limit'] = $request->input('limit', 20);
        $data['title'] = 'Compute';
        if ($tab == 'encoder') {
            $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction'] , $data['limit']);
        } elseif ($tab == 'storage') {
            $data['storages'] = $this->svStorageService->getALlSvStorages($data['column'], $data['direction'] , $data['limit']);
        } elseif ($tab == 'stream') {
            $data['streams'] = $this->svStreamService->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
        } else {
            $data['downloads'] = $this->svDownloadService->getAllSvDownloads($data['column'], $data['direction'], $data['limit']);
        }
        return $data;
    }
    public function index(Request $request){
        $tab = $request->input('tab', 'storage');
        $data = $this->getData($request, $tab);
        return view('admin.compute.compute', $data);
    }
    public function computeController(Request $request)
    {
        $tab = $request->input('tab');
        return $this->getData($request, $tab);

    }

    public function create(Request $request)
    {
        $tab = $request->input('tab');
        $data = $this->getData($request, $tab);
        return view('admin.compute.create', $data);
    }
}
