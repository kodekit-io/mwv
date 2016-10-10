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

    public function reachTrendData()
    {
        $chart = $this->projectChartService->reachTrend();
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionTrendData()
    {
        $chart = $this->projectChartService->interactionTrend();
        return \GuzzleHttp\json_encode($chart);
    }

    public function buzzPieData()
    {
        $chart = $this->projectChartService->buzzPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function postPieData()
    {
        $chart = $this->projectChartService->postPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionPieData()
    {
        $chart = $this->projectChartService->interactionPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function uniqueUserPieData()
    {
        $chart = $this->projectChartService->uniqueUserPie();
        return \GuzzleHttp\json_encode($chart);
    }

    public function sentimentBarData()
    {
        $chart = $this->projectChartService->sentimentBar();
        //var_dump($chart); exit;
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionBarData()
    {
        $chart = $this->projectChartService->interactionBar();
        return \GuzzleHttp\json_encode($chart);
    }

    public function shareOfMediaBarData()
    {
        $chart = $this->projectChartService->shareOfMediaBar();
        //var_dump($chart->getContents()); exit;
        // echo \GuzzleHttp\json_encode($chart); exit;
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


}
