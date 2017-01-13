<?php

namespace App\Http\Controllers;

use App\ProjectService;
use App\ReportService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    private $projectService;
    private $reportService;

    /**
     * ReportController constructor.
     * @param ProjectService $projectService
     * @param ReportService $reportService
     */
    public function __construct(ProjectService $projectService, ReportService $reportService)
    {
        $this->projectService = $projectService;
        $this->reportService = $reportService;
    }

    public function add()
    {
        $data['pageTitle'] = 'Create Report';
        $projectInfos = $this->projectService->projectListWithKeywords();
        $data['projectSelect'] = $this->projectService->projectSelect($projectInfos, 'project', 'reportProject');
        $data['keywordSelect'] = $this->projectService->keywordSelect($projectInfos, 'keyword', 'reportKeyword');
        $data['accountSelect'] = $this->projectService->accountSelect('account', 'account');

        return view('mediawave.report-add', $data);
    }

    public function save(Request $request)
    {
        var_dump($request->all()); exit();
        $response = $this->reportService->createReport($request->except(['_token']));

        if ($response->status == 'OK') {
            return redirect('report-view')->with(['message' => $response->msg]);
        } else {
            return redirect('report-add')
                ->withInput()
                ->with(['message' => $response->msg]);
        }
    }

    public function view()
    {
        $data['pageTitle'] = 'View Report';
        $reports = $this->reportService->getReports();
        $data['reports'] = $reports->data;
        //var_dump($data['reports']); exit;
        return view('mediawave.report-view', $data);
    }

    public function delete($reportId)
    {
        $response = $this->reportService->delete($reportId);

        return redirect('report-view')->with(['message' => $response->msg]);
    }

}
