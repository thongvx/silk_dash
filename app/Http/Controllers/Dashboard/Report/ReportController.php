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
    private function getReportData(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $tab = $request->input('tab', 'date-table');
        $startDate = $request->input('startDate', date('Y-m-d', strtotime('-1')));
        $endDate = $request->input('endDate', date('Y-m-d'));
        $country = $request->input('country', null);
        $data = [
            'title' => 'Report',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'country' => $country,
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
        if ($request->input('tab') == 'date-table') {
            return view('dashboard.report.date-table', $report);
        } else {
            return view('dashboard.report.country-table', $report);
        }
    }


}
