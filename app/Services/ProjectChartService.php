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



    public function buzzTrend($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'.$mediaId.'/buzztrend', $params);
    }

    public function reachTrend($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'.$mediaId.'/reachtrend', $params);
    }

    public function postTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/posttrend', $params);
    }

    public function interactionTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/8/interactiontrend', $params);
    }

    public function buzzPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/buzz', $params);
    }

    public function interactionPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/interaction', $params);
    }

    public function postPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/' . $mediaId .'/post', $params);
    }

    public function sentimentBar($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/sentiment', $params);
    }

    public function interactionBar($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/interactionrate', $params);
    }

    public function convoData($source, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'.$source.'/convo', $params);
    }

    public function potentialPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/potentialreach', $params);
    }

    public function commentPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/comment', $params);
    }

    public function sharePie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/share', $params);
    }

    public function reachPie($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/reach', $params);
    }

    public function commentTrend($mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/'. $mediaId .'/commenttrend', $params);
    }

    public function brandEquity($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/brandequity', $params);
    }

    public function uniqueUserPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/uniqueuser', $params);
    }

    public function shareOfMediaBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/shareofmedia', $params);
    }

    public function userTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('usertrend', $projectId, $keywords, $startDate, $endDate);
    }

    public function viralPie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viralreach', $projectId, $keywords, $startDate, $endDate);
    }

    public function likePie($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('like', $projectId, $keywords, $startDate, $endDate);
    }

    public function commentBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('commentinteraction', $projectId, $keywords, $startDate, $endDate);
    }

    public function ratingBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('rating', $projectId, $keywords, $startDate, $endDate);
    }

    public function viewTrend($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viewtrend', $projectId, $keywords, $startDate, $endDate);
    }

    public function countBar($projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viewcount', $projectId, $keywords, $startDate, $endDate);
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

    private function getChartWithoutMedia($action, $projectId, $keywords, $startDate, $endDate)
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        return $this->getChart('project/1/' . $action, $params);
    }
}
