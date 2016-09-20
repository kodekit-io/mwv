<?php

namespace App;


class ChartService
{

    protected $apiService;

    /**
     * Chart constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function projectChart($projectId, $chartIds)
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