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
            if ($chart) {
                $data['charts'][$project->pid]['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
            }
        }

        return view('home', $data);
    }

    public function projectChart($projectId, $chartIds)
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => $chartIds,
            'StartDate' => '2016-08-01',
            'EndDate' => date('Y-m-d'),
            'sentiment' => '1,0,-1'
        ];

        return $this->apiService->getChart($params);
    }
}
