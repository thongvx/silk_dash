<?php

namespace App\Http\Controllers\Dashboard\Report;

use App\Repositories\ReportRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportRepo;

    public function __construct(ReportRepo $reportRepo)
    {
        $this->reportRepo = $reportRepo;
    }
    public function getReportData(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tab = $request->get('tab');
        $date = $request->input('date');
        switch ($date)
        {
            case 'today':
                $startDate = date('Y-m-d');
                $endDate = date('Y-m-d');
                break;
            case 'yesterday':
                $startDate = date('Y-m-d', strtotime('-1 day'));
                $endDate = date('Y-m-d', strtotime('-1 day'));
                break;
            case '7days':
                $startDate = date('Y-m-d', strtotime('-7 day'));
                $endDate = date('Y-m-d');
                break;
            case '30days':
                $startDate = date('Y-m-d', strtotime('-30 day'));
                $endDate = date('Y-m-d');
                break;
            default:
                $startDate = $request->input('startDate', date('Y-m-d', strtotime('-7 day')));
                $endDate = $request->input('endDate', date('Y-m-d'));
        }
        $country = $request->input('country', null);
        $data = [
            'title' => 'Report',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'country' => $country,
            'tab' => $tab,
            'report' => $this->reportRepo->getAllData($userId, $tab, $startDate, $endDate, $country),
        ];
        return $data;
    }

    public function index(Request $request)
    {
        $report = $this->getReportData($request);

        return view('dashboard.report.report', $report);
    }

    public function store(Request $request)
    {
        $report = $this->getReportData($request);
        $tab = $request->get('tab');
        if ($tab == 'date') {
            return view('dashboard.report.date', $report);
        } else {
            return view('dashboard.report.country', $report);
        }
    }


}
