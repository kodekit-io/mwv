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
        $chart = $this->chartService->projectChart($projectId, '1');
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }
}
