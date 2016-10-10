<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\KeywordSelected;
use App\ProjectService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

class ProjectTwitterController extends Controller
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
}
