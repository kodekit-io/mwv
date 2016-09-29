<?php

namespace App\Http\Controllers;

use App\ApiService;
use App\ChartService;
use App\ProjectService;
use Carbon\Carbon;
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
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12,A');
        $data['pageTitle'] = 'All Media';
        $data['project'] = $chart->project;

        $chartData = $this->chartService->getBuzzData($chart);
        $data['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
        $data['shareOfVoice'] = \GuzzleHttp\json_encode($chart->shareOfVoice);
        $data['volumeTrending'] = \GuzzleHttp\json_encode($chart->volumeTrending);
        $data['mediaDistribution'] = \GuzzleHttp\json_encode($chart->mediaDistribution);
        $data['sentimentMediaDistribution'] = \GuzzleHttp\json_encode($chart->sentimentMediaDistribution);
        $data['sentimentBrandDistributions'] = \GuzzleHttp\json_encode($chart->sentimentBrandDistributions);
        $data['projectBuzz'] = \GuzzleHttp\json_encode($chartData);

        $data['projectId'] = $projectId;

        return view('mediawave.project-detail', $data);
    }

    public function detailTW($projectId)
    {
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12,14');
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

        return view('mediawave.project-twitter', $data);
    }
    public function detailFB($projectId)
    {
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');

        $data['pageTitle'] = 'Facebook';
        $data['project'] = $chart->project;

        $data['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
        $data['shareOfVoice'] = \GuzzleHttp\json_encode($chart->shareOfVoice);
        $data['volumeTrending'] = \GuzzleHttp\json_encode($chart->volumeTrending);
        $data['mediaDistribution'] = \GuzzleHttp\json_encode($chart->mediaDistribution);
        $data['sentimentMediaDistribution'] = \GuzzleHttp\json_encode($chart->sentimentMediaDistribution);
        $data['sentimentBrandDistributions'] = \GuzzleHttp\json_encode($chart->sentimentBrandDistributions);

        $data['projectId'] = $projectId;
        return view('mediawave.project-facebook', $data);
    }
    public function detailNews($projectId)
    {
        $data['pageTitle'] = 'Online Media';
        $data['projectId'] = $projectId;
        return view('mediawave.project-news', $data);
    }
    public function detailForum($projectId)
    {
        $data['pageTitle'] = 'Forum';
        $data['projectId'] = $projectId;
        return view('mediawave.project-forum', $data);
    }
    public function detailVideo($projectId)
    {
        $data['pageTitle'] = 'Video';
        $data['projectId'] = $projectId;
        return view('mediawave.project-video', $data);
    }
    public function detailBlog($projectId)
    {
        $data['pageTitle'] = 'Blog';
        $data['projectId'] = $projectId;
        return view('mediawave.project-blog', $data);
    }


    public function profile()
    {
        $data['pageTitle'] = 'Profile';
        return view('mediawave.profile', $data);
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

    //SOCMED PAGE
    public function socmedTW()
    {
        $data['pageTitle'] = 'Twitter';
        return view('mediawave.socmed-twitter', $data);
    }
    public function socmedFB()
    {
        $data['pageTitle'] = 'Facebook';
        return view('mediawave.socmed-facebook', $data);
    }
    public function socmedYT()
    {
        $data['pageTitle'] = 'Youtube';
        return view('mediawave.socmed-youtube', $data);
    }
    public function socmedIG()
    {
        $data['pageTitle'] = 'Instagram';
        return view('mediawave.socmed-instagram', $data);
    }

}
