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

    private function getChart($url, $params)
    {
        return $this->apiService->postDummy($url, $params, true);
    }

    public function brandEquity($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/brandequity', $params);
    }

    public function buzzTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/buzztrend', $params);
    }

    public function postTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/posttrend', $params);
    }

    public function reachTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/reachtrend', $params);
    }

    public function interactionTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/interactiontrend', $params);
    }

    public function buzzPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/buzz', $params);
    }

    public function interactionPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/interaction', $params);
    }

    public function postPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/post', $params);
    }

    public function uniqueUserPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/uniqueuser', $params);
    }

    public function generateParams($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        return [
            'pid' => $projectId,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];
    }

    public function sentimentBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/sentiment', $params);
    }

    public function interactionBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/interactionrate', $params);
    }

    public function shareOfMediaBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/shareofmedia', $params);
    }

    public function convoData($source, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'.$source.'/convo', $params);
    }
}
