<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\KeywordSelected;
use App\ProjectRequestParser;
use App\ProjectService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

class ProjectTwitterController extends Controller
{

    use KeywordSelected;
    use ProjectRequestParser;

    private $projectService;
    /**
     * @var ChartService
     */
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
        $data['pageTitle'] = 'Twitter';

        return view('mediawave.project-twitter', $data);
    }
}
