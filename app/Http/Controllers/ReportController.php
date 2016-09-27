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
        $data['pageTitle'] = 'Report';
        // $projects = $this->projectService->projectListWithKeywords();
        // var_dump($projects); exit;

        return view('mediawave.report-add', $data);
    }

    public function reportView()
    {
        $data['pageTitle'] = 'Report';

        return view('mediawave.report-view', $data);
    }

}
