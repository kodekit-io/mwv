<?php

namespace App\Http\Controllers;

use App\ApiService;
use App\ProjectService;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    private $projectService;

    /**
     * DashboardController constructor.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectService->projectList();
        $data['projects'] = $projects;
        $data['pageTitle'] = 'Dashboard';

        return view('mediawave.home', $data);
    }


}
