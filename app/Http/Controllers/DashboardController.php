<?php

namespace App\Http\Controllers;

use App\ApiService;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    protected $apiService;

    /**
     * DashboardController constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $projects = $this->apiService->projectList();
        $data['projects'] = $projects;

         foreach ($projects as $project) {
             $chart = $this->projectChart($project->pid, '1');
             $data[$project->pid]['project'] = $project;
             $data[$project->pid]['brandEquity'] = $chart->brandEquity;
         }

        // var_dump($data);

        return view('home', $data);
    }

    public function projectChart($projectId, $chartIds)
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => $chartIds,
            'StartDate' => '2016-08-01',
            'EndDate' => '2016-08-2',
            'sentiment' => '1,0,-1'
        ];

        return $this->apiService->post('dashboard/analytics/charts', $params);
    }
}
