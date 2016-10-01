<?php

namespace App\Http\Controllers;

use App\ChartService;
use App\Http\Requests;

class ChartController extends Controller
{
    protected $chartService;

    /**
     * ChartController constructor.
     * @param $chartService
     */
    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function chartOne($projectId)
    {
        $dateRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $dateRange['startDate'];
        $endDate = $dateRange['endDate'];
        $chart = $this->chartService->projectChart($projectId, '1', '', $startDate, $endDate);
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }
}
