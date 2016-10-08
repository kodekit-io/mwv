<?php

namespace App;


class ProjectChartService
{

    protected $apiService;

    /**
     * ProjectChartService constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function brandEquity($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'pid' => $projectId,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        return $this->getChart('project/brandequity', $params);
    }

    public function buzzTrend($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        return $this->getChart('project/'.$projectId.'/8/buzztrend', $params);
    }

    private function getChart($url, $params)
    {
        return $this->apiService->postDummy($url, $params, true);
    }

    public function postTrend($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        return $this->getChart('project/'.$projectId.'/8/posttrend', $params);
    }

    public function reachTrend($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        return $this->getChart('project/'.$projectId.'/reachtrend', $params);
    }

    public function interactionTrend($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        return $this->getChart('project/'.$projectId.'/8/interactiontrend', $params);
    }
}