<?php

namespace App\Http\Controllers;

use App\ApiService;
use App\ChartService;
use App\DatatableService;
use App\ProjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

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

    public function detail(Request $request, $projectId)
    {
        $brands = '';
        $last7DaysRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        if ($request->has('filter')) {
            // var_dump($request->input());
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
        }

        $profiles = $this->projectService->projectInfo($projectId);
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12,A', $brands, $startDate, $endDate);
        $wordCloud = $this->chartService->wordCloud($projectId, $brands, $startDate, $endDate);
        $viewInfluencer = $this->chartService->viewInfluencer($projectId, $brands, $startDate, $endDate);
        // $viewMediaDetail = $this->chartService->viewMediaDetail($projectId, $brands, $startDate, $endDate);

        $keywords = [];
        if (count($profiles->projectInfo->keywordList) > 0) {
            $keywordLists = $profiles->projectInfo->keywordList;
            foreach ($keywordLists as $keywordList) {
                $keywordId = $keywordList->keyword->keywordId;
                $keywordName = $keywordList->keyword->keywordName;
                $keywords[$keywordId]['value'] = $keywordName;
                $keywords[$keywordId]['selected'] = $this->isKeywordSelected($keywordId, $request);
            }
        }

        $data['pageTitle'] = 'All Media';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;

        $buzzTrendData = $this->chartService->getBuzzTrendData($chart, $startDate, $endDate);
        // $postTrendData = $this->chartService->getPostTrendData($viewMediaDetail);
        $data['brandEquity'] = \GuzzleHttp\json_encode($chart->brandEquity);
        $data['shareOfVoice'] = \GuzzleHttp\json_encode($chart->shareOfVoice);
        $data['volumeTrending'] = \GuzzleHttp\json_encode($chart->volumeTrending);
        $data['mediaDistribution'] = \GuzzleHttp\json_encode($chart->mediaDistribution);
        $data['sentimentMediaDistribution'] = \GuzzleHttp\json_encode($chart->sentimentMediaDistribution);
        $data['sentimentBrandDistributions'] = \GuzzleHttp\json_encode($chart->sentimentBrandDistributions);
        $data['projectBuzzTrend'] = \GuzzleHttp\json_encode($buzzTrendData);
        //$data['projectPostTrend'] = \GuzzleHttp\json_encode($postTrendData);
        $data['wordCloud'] = \GuzzleHttp\json_encode($wordCloud->dataUnion);
        $data['viewInfluencers'] = $viewInfluencer->influencer;
        // $data['viewMediaDetail'] - $viewMediaDetail->mediaDetail;

        $data['projectId'] = $projectId;

        return view('mediawave.project-detail', $data);
    }

    public function conversation(Request $request)
    {
        $projectId = $request->input('project_id');
        $start = $request->input('start');
        $rpp = $request->input('length');
        $media = $request->input('source');
        $startDate = $request->input('start_date');
        $startDate = Carbon::createFromFormat('d/m/y', $startDate)->format("Y-m-d");
        $endDate = $request->input('end_date');
        $endDate = Carbon::createFromFormat('d/m/y', $endDate)->format("Y-m-d");
        $page = ($start/$rpp) + 1;
        $search = $request->input('search');
        $search = ( $search['value'] != '' ? $search['value'] : '' );

        $conversation = $this->chartService->getConversation($projectId, $media, $page, $rpp, $search, '', $startDate, $endDate);
        $data = $conversation->message;
        $totalPage = $conversation->totalPage;
        $datatable = new DatatableService();
        $totalRow = ($totalPage * $rpp) - 1;

        $return = $datatable->generateOutput($data, $media, $totalRow);

        echo json_encode($return);
    }

    public function detailTW($projectId)
    {
        $data['pageTitle'] = 'Twitter';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-twitter', $data);
    }
    public function detailFB($projectId)
    {
        $data['pageTitle'] = 'Facebook';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-facebook', $data);
    }
    public function detailNews($projectId)
    {
        $data['pageTitle'] = 'Online Media';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-news', $data);
    }
    public function detailForum($projectId)
    {
        $data['pageTitle'] = 'Forum';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-forum', $data);
    }
    public function detailVideo($projectId)
    {
        $data['pageTitle'] = 'Video';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;        return view('mediawave.project-video', $data);
    }
    public function detailBlog($projectId)
    {
        $data['pageTitle'] = 'Blog';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;        return view('mediawave.project-blog', $data);
    }

    public function detailIG($projectId)
    {
        $data['pageTitle'] = 'Instagram';
        $chart = $this->chartService->projectChart($projectId, '1,2,3,4,5,6,12');
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;        return view('mediawave.project-ig', $data);
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

    private function isKeywordSelected($keywordId, $request)
    {
        $select = '';
        if ($request->has('keywords')) {
            if (in_array($keywordId, $request->input('keywords'))) {
                $select = 'checked';
            }
        } else {
            $select = 'checked';
        }
        return $select;
    }


}
