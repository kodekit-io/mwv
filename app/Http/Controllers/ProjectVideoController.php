<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\KeywordSelected;
use App\ProjectRequestParser;
use App\ProjectService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ProjectVideoController extends Controller
{
    use KeywordSelected;
    use ProjectRequestParser;

    private $projectService;
    private $chartService;

    /**
     * ProjectController constructor.
     * @param ProjectService $projectService
     * @param ChartService $chartService
     */
    public function __construct(ProjectService $projectService, ChartService $chartService)
    {
        $this->projectService = $projectService;
        $this->chartService = $chartService;
    }

    public function detail(Request $request, $projectId)
    {
        $data = $this->parseRequest($request, $projectId);
        $data['pageTitle'] = 'Video';

        return view('mediawave.project-video', $data);
    }
}
