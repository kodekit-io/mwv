<?php

namespace App\Http\Controllers;

use App\ApiService;
use App\ChartService;
use App\ProjectService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{

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

    public function index()
    {
        $data['projects'] = $this->projectService->projectList();
//        $project1 = new \stdClass();
//        $project1->pname = 'Project 1';
//        $projects[] = $project1;
//        $data['projects'] = $projects;
//        var_dump($data['projects']);
        return view('project-list', $data);
    }

    public function add()
    {
        $data['pageTitle'] = 'Create Project';
        return view('mediawave.add-project', $data);
    }
    public function addig()
    {
        $data['pageTitle'] = 'Create Instagram Project';
        return view('mediawave.add-project-ig', $data);
    }

    public function save(Request $request)
    {
        $response = $this->projectService->addProject($request->except(['_token']));
        if ($response->status == 'OK') {
            return redirect('dashboard')->with(['message' => $response->msg]);
        } else {
            return redirect('add-project')
                ->withInput()
                ->with(['message' => $response->msg]);
        }
    }

    public function detail($projectId)
    {
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['pageTitle'] = 'Project Detail';
        $data['project'] = $chart->project;

        //var_dump($chart); exit;

        $data['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
        $data['shareOfVoice'] = \GuzzleHttp\json_encode($chart->shareOfVoice);
        $data['volumeTrending'] = \GuzzleHttp\json_encode($chart->volumeTrending);
        $data['mediaDistribution'] = \GuzzleHttp\json_encode($chart->mediaDistribution);
        $data['sentimentMediaDistribution'] = \GuzzleHttp\json_encode($chart->sentimentMediaDistribution);
        $data['sentimentBrandDistributions'] = \GuzzleHttp\json_encode($chart->sentimentBrandDistributions);

        $data['projectId'] = $projectId;

        return view('mediawave.project-detail', $data);
    }

    public function detailTwitter($projectId)
    {
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['pageTitle'] = 'Twitter';
        $data['project'] = $chart->project;

        //var_dump($chart); exit;

        $data['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
        $data['shareOfVoice'] = \GuzzleHttp\json_encode($chart->shareOfVoice);
        $data['volumeTrending'] = \GuzzleHttp\json_encode($chart->volumeTrending);
        $data['mediaDistribution'] = \GuzzleHttp\json_encode($chart->mediaDistribution);
        $data['sentimentMediaDistribution'] = \GuzzleHttp\json_encode($chart->sentimentMediaDistribution);
        $data['sentimentBrandDistributions'] = \GuzzleHttp\json_encode($chart->sentimentBrandDistributions);

        $data['projectId'] = $projectId;

        return view('mediawave.project-detail-twitter', $data);
    }
    public function reportAdd()
    {
        $data['pageTitle'] = 'Create Report';
        return view('mediawave.report-add', $data);
    }
    public function reportView()
    {
        $data['pageTitle'] = 'View Report';
        return view('mediawave.report-view', $data);
    }

    public function edit($projectId)
    {
        $projectInfo = $this->projectService->projectInfo($projectId);
        $data['project'] = $projectInfo->project;
        $data['keywords'] = $projectInfo->projectInfo->keywordList;
        $data['topics'] = $projectInfo->projectInfo->topicList;
        $data['excludes'] = $projectInfo->projectInfo->noiseKeywordList;
        $data['pageTitle'] = 'Edit Project';

        return view('mediawave.edit-project', $data);
    }

    public function update(Request $request)
    {
        $response = $this->projectService->updateProject($request->except(['_token']));

        return redirect('dashboard')->with(['message' => $response->msg]);

    }
}
