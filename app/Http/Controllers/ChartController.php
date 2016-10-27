<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\Http\Requests;
use App\ProjectChartService;

class ChartController extends Controller
{
    protected $chartService;
    protected $projectChartService;

    /**
     * ChartController constructor.
     * @param $chartService
     */
    public function __construct(ChartService $chartService, ProjectChartService $projectChartService)
    {
        $this->chartService = $chartService;
        $this->projectChartService = $projectChartService;
    }

    public function chartOne($projectId)
    {
        $dateRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $dateRange['startDate'];
        $endDate = $dateRange['endDate'];
        $chart = $this->chartService->projectChart($projectId, '1', '', $startDate, $endDate);
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }

    public function brandEquityData()
    {
        $chart = $this->projectChartService->brandEquity();
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }

    public function buzzTrendData($mediaId)
    {
        $chart = $this->projectChartService->buzzTrend($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function postTrendData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->postTrend($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function reachTrendData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->reachTrend($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionTrendData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->interactionTrend($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function userTrendData($type = 1)
    {
        $chart = $this->projectChartService->userTrend($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function buzzPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->buzzPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function postPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->postPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->interactionPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function uniqueUserPieData()
    {
        $chart = $this->projectChartService->uniqueUserPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function viralPieData($type = 1)
    {
        $chart = $this->projectChartService->viralPie($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function potentialPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->potentialPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->commentPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function likePieData($type = 1)
    {
        $chart = $this->projectChartService->likePie($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function sharePieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->sharePie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function sentimentBarData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->sentimentBar($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionBarData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->interactionBar($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function shareOfMediaBarData()
    {
        $chart = $this->projectChartService->shareOfMediaBar();
        //var_dump($chart->getContents()); exit;
        // echo \GuzzleHttp\json_encode($chart); exit;
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentBarData($type = 1)
    {
        $chart = $this->projectChartService->commentBar($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoTwitterData()
    {
        $chart = $this->projectChartService->convoData(2);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoFacebookData()
    {
        $chart = $this->projectChartService->convoData(1);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoNewsData()
    {
        $chart = $this->projectChartService->convoData(4);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoForumData()
    {
        $chart = $this->projectChartService->convoData(6);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoVideoData()
    {
        $chart = $this->projectChartService->convoData(5);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoBlogData()
    {
        $chart = $this->projectChartService->convoData(3);
        return \GuzzleHttp\json_encode($chart);
    }

    public function convoInstagramData()
    {
        $chart = $this->projectChartService->convoData(7);
        return \GuzzleHttp\json_encode($chart);
    }

    public function reachPieData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->reachPie($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentTrendData($mediaId, $type = 1)
    {
        $chart = $this->projectChartService->commentTrend($mediaId, $type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function ratingBarData($type = 1)
    {
        $chart = $this->projectChartService->ratingBar($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function viewTrendData($type = 1)
    {
        $chart = $this->projectChartService->viewTrend($type);
        return \GuzzleHttp\json_encode($chart);
    }

    public function countBarData()
    {
        $chart = $this->projectChartService->countBar();
        return \GuzzleHttp\json_encode($chart);
    }


}
