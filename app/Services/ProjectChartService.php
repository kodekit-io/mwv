<?php

namespace App;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectChartService
{

    protected $apiService;
    protected $request;

    /**
     * ProjectChartService constructor.
     * @param $apiService
     */
    public function __construct(Request $request, ApiService $apiService)
    {
        $this->apiService = $apiService;
        $this->request = $request;
    }

    private function getChart($url, $params)
    {
        return $this->apiService->postDummy($url, $params, true);
    }

    public function brandEquity()
    {
        $params = $this->generateParams();

        return $this->getChart('project/brandequity', $params);
    }

    public function uniqueUserPie()
    {
        $params = $this->generateParams();

        return $this->getChart('project/uniqueuser', $params);
    }

    public function shareOfMediaBar()
    {
        $params = $this->generateParams();

        return $this->getChart('project/shareofmedia', $params);
    }

    // chart with media
    public function postTrend($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('posttrend', $type, $mediaId);
    }

    public function buzzTrend($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('buzztrend', $type, $mediaId);
    }

    public function reachTrend($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('reachtrend', $type, $mediaId);
    }

    public function interactionTrend($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('interactiontrend', $type, $mediaId);
    }

    public function buzzPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('buzz', $type, $mediaId);
    }

    public function interactionPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('interaction', $type, $mediaId);
    }

    public function postPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('post', $type, $mediaId);
    }

    public function sentimentBar($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('sentiment', $type, $mediaId);
    }

    public function interactionBar($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('interactionrate', $type, $mediaId);
    }

    public function convoData($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('convo', $type, $mediaId);
    }

    public function potentialPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('potentialreach', $type, $mediaId);
    }

    public function commentPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('comment', $type, $mediaId);
    }

    public function sharePie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('share', $type, $mediaId);
    }

    public function reachPie($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('reach', $type, $mediaId);
    }

    public function commentTrend($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('commenttrend', $type, $mediaId);
    }

    public function socialWordCloud($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('wordcloud', $type, $mediaId);
    }

    public function influencer($mediaId, $type = 1)
    {
        return $this->getChartWithMedia('influencer', $type, $mediaId);
    }

    //chart without media
    public function userTrend($type = 1)
    {
        return $this->getChartWithoutMedia('usertrend', $type);
    }

    public function viralPie($type = 1)
    {
        return $this->getChartWithoutMedia('viralreach', $type);
    }

    public function likePie($type = 1)
    {
        return $this->getChartWithoutMedia('like', $type);
    }

    public function commentBar($type = 1)
    {
        return $this->getChartWithoutMedia('commentinteraction', $type);
    }

    public function ratingBar($type = 1)
    {
        return $this->getChartWithoutMedia('rating', $type);
    }

    public function viewTrend($type = 1)
    {
        return $this->getChartWithoutMedia('viewtrend', $type);
    }

    public function potentialReachTrend($type = 1)
    {
        return $this->getChartWithoutMedia('potensialreachtrend', $type);
    }

    public function countBar($type = 1)
    {
        return $this->getChartWithoutMedia('viewcount', $type);
    }

    public function generateParams($projectId = '', $keywords = '', $startDate = '', $endDate = '', $search = '')
    {
        $projectId = $projectId == '' ? ( $this->request->has('projectId') ? $this->request->input('projectId') : '') : $projectId;
        $keywords = $keywords == '' ? ( $this->request->has('keywords') ? $this->request->input('keywords') : '') : $keywords;
        $startDate = $startDate == '' ? ( $this->request->has('startDate') ? $this->request->input('startDate') : '') : $startDate;
        $endDate = $endDate == '' ? ( $this->request->has('endDate') ? $this->request->input('endDate') : '') : $endDate;
        $searchText = $search == '' ? ( $this->request->has('search') ? $this->request->input('search') : '') : $search;

        return [
            'pid' => $projectId,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords,
            'text' => $searchText
        ];
    }

    private function getChartWithoutMedia($action, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '', $search = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate, $search);

        // Log::warning($action . '==>' . json_encode($params));

        return $this->getChart('project/' . $type .'/' . $action, $params);
    }

    private function getChartWithMedia($action, $type = 1, $mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '', $search = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate, $search);

        // Log::warning($action . '==>' . json_encode($params));

        return $this->getChart('project/'. $type .'/'. $mediaId .'/'. $action, $params);
    }

}
