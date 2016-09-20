<?php

namespace App\Http\Controllers;

use App\ApiService;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChartController extends Controller
{
    protected $apiService;

    /**
     * ChartController constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function chartOne($projectId)
    {
        $chart = $this->projectChart($projectId, '1');
        return \GuzzleHttp\json_encode($chart->brandEquity);
    }

    protected function projectChart($projectId, $chartIds)
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => $chartIds,
            'StartDate' => '2016-08-01',
            'EndDate' => date('Y-m-d'),
            'sentiment' => '1,0,-1'
        ];

        return $this->apiService->getChart($params);
    }
}
