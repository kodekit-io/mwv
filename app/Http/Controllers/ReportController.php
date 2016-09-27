<?php

namespace App\Http\Controllers;

use App\ProjectService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    private $projectService;

    /**
     * ReportController constructor.
     * @param $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function reportAdd()
    {
        $data['pageTitle'] = 'Create Report';
        $projectInfos = $this->projectService->projectListWithKeywords();
        $data['projectSelect'] = $this->projectService->projectSelect($projectInfos, 'project', 'reportProject');
        $data['keywordSelect'] = $this->projectService->keywordSelect($projectInfos, 'keyword', 'reportKeyword');

        return view('mediawave.report-add', $data);
    }

    public function reportView()
    {
        $data['pageTitle'] = 'View Report';

        return view('mediawave.report-view', $data);
    }

}
