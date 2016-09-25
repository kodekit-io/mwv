<?php

namespace App;


class ChartService
{

    protected $apiService;
    /**
     * @var FakeResult
     */
    private $fakeResult;

    /**
     * Chart constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService, FakeResult $fakeResult)
    {
        $this->apiService = $apiService;
        $this->fakeResult = $fakeResult;
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

        return $this->getChart($params);
    }

    public function getChart($params)
    {
        return $this->apiService->post('dashboard/analytics/charts', $params, true);
        $fakeResult = $this->fakeResult->fakeChart($params['pid']);
        if ($fakeResult) {
            return \GuzzleHttp\json_decode($fakeResult);
        }
    }

}