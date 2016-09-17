<?php

namespace App\Http\Controllers;

use App\ApiService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{

    protected $apiService;

    /**
     * ProjectController constructor.
     * @param $apiService
     */
    public function __construct()
    {
        $apiService = new ApiService();
        $this->apiService = $apiService;
    }

    public function index()
    {
        $data['projects'] = $this->apiService->projectList();
//        $project1 = new \stdClass();
//        $project1->pname = 'Project 1';
//        $projects[] = $project1;
//        $data['projects'] = $projects;
//        var_dump($data['projects']);
        return view('project-list', $data);
    }

    public function add()
    {
        return view('add-project');
    }

    public function saveProject(Request $request)
    {
        $projectName = $request->input('name');
        $response = $this->apiService->addProject($projectName);
//        var_dump($response); exit;
        if ($response->status == 'OK') {
            return redirect('project-management')->with(['message' => $response->msg]);
        } else {
            return redirect('add-project')
                ->withInput()
                ->with(['message' => $response->msg]);
        }


    }
}
