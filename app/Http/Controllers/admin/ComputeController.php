<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ServerStream\SvStreamService;
use App\Services\ServerStorage\SvStorageService;
use App\Services\ServerEncoder\SvEncoderService;

class ComputeController extends Controller
{
    protected $svStreamService, $svStorageService, $svEncoderService;

    public function __construct( SvStreamService $svStreamService, SvStorageService $svStorageService, SvEncoderService $svEncoderService)
    {
        $this->svStreamService = $svStreamService;
        $this->svStorageService = $svStorageService;
        $this->svEncoderService = $svEncoderService;
    }

    private function getData(Request $request, string $tab)
    {
        $data['column'] = $request->input('column', 'created_at');
        $data['direction'] = $request->input('direction', 'asc');
        $data['limit'] = $request->input('limit', 20);
        $data['title'] = 'Compute';

        if ($tab == 'encoder') {
            $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['encoders']->total();
        } elseif ($tab == 'storage') {
            $data['storages'] = $this->svStorageService->getALlSvStorages($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['storages']->total();
        } elseif ($tab == 'stream') {
            $data['streams'] = $this->svStreamService->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['streams']->total();
        } else {
            $data['encoders'] = $this->svEncoderService->getAllSvEncoders($data['column'], $data['direction'], $data['limit']);
            $data['total'] = $data['encoders']->total();
        }

        return $data;
    }
    public function index(Request $request){
        $tab = $request->input('tab', 'storage');
        $data = $this->getData($request, $tab);
        return view('admin.compute.compute', $data);
    }
    public function computeControler(Request $request)
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
