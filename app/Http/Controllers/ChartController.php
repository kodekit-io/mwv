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

    public function brandEquityData($projectId)
    {
        $chart = $this->projectChartService->brandEquity($projectId);
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }

    public function buzzTrendData($projectId)
    {
        $chart = $this->projectChartService->buzzTrend($projectId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function postTrendData($projectId)
    {
        $chart = $this->projectChartService->postTrend($projectId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function reachTrendData($projectId)
    {
        $chart = $this->projectChartService->reachTrend($projectId);
        return \GuzzleHttp\json_encode($chart);
    }

    public function interactionTrendData($projectId)
    {
        $chart = $this->projectChartService->interactionTrend($projectId);
        return \GuzzleHttp\json_encode($chart);
    }
}
