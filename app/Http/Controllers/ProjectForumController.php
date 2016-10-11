<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\KeywordSelected;
use App\ProjectService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

class ProjectForumController extends Controller
{
    use KeywordSelected;

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
        $brands = '';
        $last7DaysRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
        }

        $profiles = $this->projectService->projectInfo($projectId);
        $wordCloud = $this->chartService->wordCloud($projectId, 9, $brands, $startDate, $endDate);
        $viewInfluencer = $this->chartService->viewInfluencer($projectId, 9, $brands, $startDate, $endDate);

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
        $data['project'] = $profiles->project;
        $data['keywords'] = $keywords;
        $data['startDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['endDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');
        $data['projectId'] = $projectId;

        $dataUnion = ( isset($wordCloud->dataUnion) ? $wordCloud->dataUnion : '' );
        $data['wordCloud'] = \GuzzleHttp\json_encode($dataUnion);

        $data['viewInfluencers'] = $viewInfluencer->influencer;

        return view('mediawave.project-forum', $data);
    }
}
