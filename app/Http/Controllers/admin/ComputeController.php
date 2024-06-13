<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ComputeRepo;

class ComputeController extends Controller
{
    protected $computeRepo;

    public function __construct( ComputeRepo $computeRepo)
    {
        $this->computeRepo = $computeRepo;
    }
    private function getData(Request $request, string $tab)
    {
        $data['column'] = $request->input('column', 'created_at');
        $data['direction'] = $request->input('direction', 'desc');
        $data['limit'] = $request->input('limit', 20);
        $data['title'] = 'Compute';

        if ($tab == 'encoder') {
            $data['encoders'] = $this->computeRepo->getAllSvEncoders($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['encoders']->total();
        } elseif ($tab == 'storage') {
            $data['storages'] = $this->computeRepo->getALlSvStorages($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['storages']->total();
        } elseif ($tab == 'stream') {
            $data['streams'] = $this->computeRepo->getAllSvStreams($data['column'], $data['direction'] , $data['limit']);
            $data['total'] = $data['streams']->total();
        } else {
            $data['encoders'] = $this->computeRepo->getAllSvEncoders($data['column'], $data['direction'], $data['limit']);
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
}
