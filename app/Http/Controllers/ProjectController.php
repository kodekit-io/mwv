<?php

namespace App\Http\Controllers;

use App\ApiService;
use App\ChartService;
use App\DatatableService;
use App\KeywordSelected;
use App\ProjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{

    use KeywordSelected;

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

        $postTrend = File::get(public_path('mediawave/jsontest/trend-post.json'));
        $postTrend = \GuzzleHttp\json_decode($postTrend);
        $data['postTrend'] = \GuzzleHttp\json_encode($postTrend);
        $reachTrend = File::get(public_path('mediawave/jsontest/trend-reach.json'));
        $reachTrend = \GuzzleHttp\json_decode($reachTrend);
        $data['reachTrend'] = \GuzzleHttp\json_encode($reachTrend);
        $interactionTrend = File::get(public_path('mediawave/jsontest/trend-interaction.json'));
        $interactionTrend = \GuzzleHttp\json_decode($interactionTrend);
        $data['interactionTrend'] = \GuzzleHttp\json_encode($interactionTrend);

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
        $dataUnion = ( isset($wordCloud->dataUnion) ? $wordCloud->dataUnion : '' );
        $data['wordCloud'] = \GuzzleHttp\json_encode($dataUnion);
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
        $searchClause = ( $search['value'] != '' ? $search['value'] : '' );
        $orderClause = '';
        if ($request->has('order')) {
//            $columns = ['screeName', 'text', 'sentimentId'];
            $order = $request->input('order')[0];
//            Log::warning('order ==> ' .  json_encode($order));
            $column = $order['column'];
            $dir = $order['dir'];
//            Log::warning('col ==> '. $column.', dir ==> ' . $dir);
//            $orderClause = $columns[$column] . ' ' . $dir;
            if ($column == 2) {
                $orderClause = 'sentiment ' . $dir;
            }
        }
        // Log::warning('order by ==> ' . json_encode($order));

        $conversation = $this->chartService->getConversation($projectId, $media, $page, $rpp, $searchClause, $orderClause, '', $startDate, $endDate);
        $data = $conversation->message;
        $totalPage = $conversation->totalPage;
        $datatable = new DatatableService();
        $totalRow = ($totalPage * $rpp) - 1;

        $return = $datatable->generateOutput($data, $media, $totalRow);

        echo json_encode($return);
    }

    public function detailTW(Request $request, $projectId)
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

        $data['pageTitle'] = 'Twitter';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-twitter', $data);
    }
    public function detailFB(Request $request, $projectId)
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

        $data['pageTitle'] = 'Facebook';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-facebook', $data);
    }
    public function detailNews(Request $request, $projectId)
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

        $data['pageTitle'] = 'Online Media';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-news', $data);
    }
    public function detailForum(Request $request, $projectId)
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

        $data['pageTitle'] = 'Forum';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-forum', $data);
    }
    public function detailVideo(Request $request, $projectId)
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

        $data['pageTitle'] = 'Video';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-video', $data);
    }
    public function detailBlog(Request $request, $projectId)
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

        $data['pageTitle'] = 'Blog';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-blog', $data);
    }

    public function detailIG(Request $request, $projectId)
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

        $data['pageTitle'] = 'Instagram';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.project-ig', $data);
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
    public function socmedTW(Request $request, $projectId)
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

        $data['pageTitle'] = 'Twitter';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.socmed-twitter', $data);
    }
    public function socmedFB(Request $request, $projectId)
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

        $data['pageTitle'] = 'Facebook';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.socmed-facebook', $data);
    }
    public function socmedYT(Request $request, $projectId)
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

        $data['pageTitle'] = 'Youtube';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.socmed-youtube', $data);
    }
    public function socmedIG(Request $request, $projectId)
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

        $data['pageTitle'] = 'Instagram';
        $data['project'] = $chart->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');;
        $data['project'] = $chart->project;
        $data['projectId'] = $projectId;
        return view('mediawave.socmed-instagram', $data);
    }


}
