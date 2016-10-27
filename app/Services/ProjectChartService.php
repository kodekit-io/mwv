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

    // chart with media
    public function postTrend($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('posttrend', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function buzzTrend($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('buzztrend', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function reachTrend($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('reachtrend', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function interactionTrend($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('interactiontrend', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function buzzPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('buzz', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function interactionPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('interaction', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function postPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('post', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function sentimentBar($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('sentiment', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function interactionBar($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('interactionrate', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function convoData($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('convo', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function potentialPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('potentialreach', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function commentPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('comment', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function sharePie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('share', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function reachPie($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('reach', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function commentTrend($mediaId, $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('commenttrend', $type, $mediaId, $projectId, $keywords, $startDate, $endDate);
    }

    public function socialWordCloud($mediaId = '', $type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithMedia('wordcloud', $mediaId, $type, $projectId, $keywords, $startDate, $endDate);
    }

    //chart without media
    public function userTrend($type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('usertrend', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function viralPie($type = 1, $projectId = '',  $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viralreach', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function likePie($type = 1, $projectId = '',  $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('like', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function commentBar($type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('commentinteraction', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function ratingBar($type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('rating', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function viewTrend($type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viewtrend', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function countBar($type = 1, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        return $this->getChartWithoutMedia('viewcount', $type, $projectId, $keywords, $startDate, $endDate);
    }

    public function generateParams($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $projectId = $projectId == '' ? ( $this->request->has('projectId') ? $this->request->input('projectId') : '') : $projectId;
        $keywords = $keywords == '' ? ( $this->request->has('keywords') ? $this->request->input('keywords') : '') : $keywords;
        $startDate = $startDate == '' ? ( $this->request->has('startDate') ? $this->request->input('startDate') : '') : $startDate;
        $endDate = $endDate == '' ? ( $this->request->has('endDate') ? $this->request->input('endDate') : '') : $endDate;

        return [
            'pid' => $projectId,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];
    }

    private function getChartWithoutMedia($action, $type = 1, $projectId, $keywords, $startDate, $endDate)
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        // Log::warning($action . '==>' . json_encode($params));

        return $this->getChart('project/' . $type .'/' . $action, $params);
    }

    private function getChartWithMedia($action, $type = 1, $mediaId, $projectId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = $this->generateParams($projectId, $keywords, $startDate, $endDate);

        // Log::warning($action . '==>' . json_encode($params));

        return $this->getChart('project/'. $type .'/'. $mediaId .'/'. $action, $params);
    }
}
