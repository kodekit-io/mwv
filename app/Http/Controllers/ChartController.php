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

    public function postTrendData()
    {
        $chart = $this->projectChartService->postTrend();
        return \GuzzleHttp\json_encode($chart);
    }

    public function reachTrendData($mediaId)
    {
        $chart = $this->projectChartService->reachTrend($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionTrendData()
    {
        $chart = $this->projectChartService->interactionTrend();
        return \GuzzleHttp\json_encode($chart);
    }

    public function userTrend()
    {
        $chart = $this->projectChartService->userTrend();
        return \GuzzleHttp\json_encode($chart);
    }

    public function buzzPieData($mediaId)
    {
        $chart = $this->projectChartService->buzzPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function postPieData($mediaId)
    {
        $chart = $this->projectChartService->postPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionPieData($mediaId)
    {
        $chart = $this->projectChartService->interactionPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function uniqueUserPieData()
    {
        $chart = $this->projectChartService->uniqueUserPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function viralPieData()
    {
        $chart = $this->projectChartService->viralPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function potentialPieData($mediaId)
    {
        $chart = $this->projectChartService->potentialPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentPieData($mediaId)
    {
        $chart = $this->projectChartService->commentPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function likePieData()
    {
        $chart = $this->projectChartService->likePie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function sharePieData($mediaId)
    {
        $chart = $this->projectChartService->sharePie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function sentimentBarData($mediaId)
    {
        $chart = $this->projectChartService->sentimentBar($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionBarData($mediaId)
    {
        $chart = $this->projectChartService->interactionBar($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function shareOfMediaBarData()
    {
        $chart = $this->projectChartService->shareOfMediaBar();
        //var_dump($chart->getContents()); exit;
        // echo \GuzzleHttp\json_encode($chart); exit;
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentBarData()
    {
        $chart = $this->projectChartService->commentBar();
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

    public function reachPieData($mediaId)
    {
        $chart = $this->projectChartService->reachPie($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function commentTrendData($mediaId)
    {
        $chart = $this->projectChartService->commentTrend($mediaId);
        return \GuzzleHttp\json_encode($chart);
    }


}
