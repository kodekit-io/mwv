<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChartService
{

    protected $apiService;
    /**
     * @var FakeResult
     */
    private $fakeResult;
    private $apiMode;

    /**
     * Chart constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService, FakeResult $fakeResult, ProjectService $projectService)
    {
        $this->apiService = $apiService;
        $this->fakeResult = $fakeResult;
        $this->apiMode = config('services.mediawave.api_mode');
    }

    public function projectChart($projectId, $chartIds, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => $chartIds,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1',
            'brandID' => $keywords
        ];

        //var_dump($params);

        return $this->getChart($params);
    }

    public function getChart($params)
    {
        if ($this->apiMode == 'PRODUCTION') {
            return $this->apiService->post('dashboard/analytics/charts', $params, true);
        }
        $fakeResult = $this->fakeResult->fakeChart($params['widgetID'], $params);
        return \GuzzleHttp\json_decode($fakeResult);
    }

    public function getBuzzTrendData($chartResult, $startDate = '', $endDate = '')
    {
        $dateRange = $this->getDateRange('2016-08-21', '2016-09-04');
        if ($this->apiMode == 'PRODUCTION') {
            $dateRange = $this->getDateRange($startDate, $endDate);
        }
        $viewTrends = $chartResult->viewTrend;
        $arrData = [];
        $x = 0;
        foreach ($viewTrends as $viewTrend) {
            $trendDates = $viewTrend->date;
            $trendBuzz = $viewTrend->buzz;

            foreach ($dateRange as $date) {
                if (! in_array($date, $trendDates)) {
                    $buzzValue = 0;
                } else {
                    $arrKey = array_keys($trendDates, $date);
                    $buzzValue = $trendBuzz[$arrKey[0]];
                }
                $arrData[$x]['name'] = $viewTrend->keywordName;
                $arrData[$x]['value'][] = $buzzValue;
            }
            $x++;
        }
        $result['dates'] = $dateRange;
        $result['chartData'] = $arrData;
        return $result;
    }

    public function getPostTrendData($chartResult)
    {
        $mediaDetails = $chartResult->mediaDetail;
        if (isset($mediaDetails->totalPost->data)) {
            foreach ($mediaDetails->totalPost->data as $post) {
                var_dump($post);
            }
            exit;
        }
        return [];
//        $arrData = [];
//        $x = 0;
//        foreach ($mediaDetails as $mediaDetail) {
//            $trendDates = $viewTrend->date;
//            $trendBuzz = $viewTrend->buzz;
//
//            foreach ($dateRange as $date) {
//                if (! in_array($date, $trendDates)) {
//                    $buzzValue = 0;
//                } else {
//                    $arrKey = array_keys($trendDates, $date);
//                    $buzzValue = $trendBuzz[$arrKey[0]];
//                }
//                $arrData[$x]['name'] = $viewTrend->keywordName;
//                $arrData[$x]['value'][] = $buzzValue;
//            }
//            $x++;
//        }
//        $result['dates'] = $dateRange;
//        $result['chartData'] = $arrData;
//        return $result;
    }

    public function getConversation($projectId, $media, $page = 1, $rpp = 10, $text = '', $order = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $mediaId = $this->getMediaByName($media);
        $params = [
            'pid' => $projectId,
            'widgetID' => 'C',
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'brandID' => $keywords,
            'currpage' => $page,
            'rpp' => $rpp,
            'text' => $text,
            'order' => $order,
            'mediaID' => $mediaId
        ];

        Log::warning('param ' . json_encode($params));

        // var_dump($params);

        return $this->getChart($params);
    }

    public function wordCloud($projectId, $mediaId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => 7,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'brandID' => $keywords,
            'mediaID' => $mediaId
        ];

        return $this->getChart($params);
    }

    public function viewInfluencer($projectId, $mediaId = '', $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => 'E',
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'brandID' => $keywords,
            'mediaID' => $mediaId
        ];

        return $this->getChart($params);
    }

    public function viewMediaDetail($projectId, $keywords = '', $startDate = '', $endDate = '')
    {
        $params = [
            'pid' => $projectId,
            'widgetID' => 'F',
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'brandID' => $keywords
        ];

        return $this->getChart($params);
    }

    private function getDateRange($startDate, $endDate)
    {
        $arrDays = [];
//        $now = Carbon::today();
//        $loopDay = $now->copy()->subDays(7);
        $loopDay = Carbon::createFromFormat('Y-m-d', $startDate);
        $now = Carbon::createFromFormat('Y-m-d', $endDate);
        for ($loopDay; $loopDay->lte($now); $loopDay->addDay()) {
            $arrDays[] = $loopDay->format('Y-m-d');
        }
        return $arrDays;
    }

    public function getLastSevenDaysRange()
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d');
        $startDate = $lastSevenDays;
        $endDate = date('Y-m-d');
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }

    public function getMediaByName($name)
    {
        $arrMedia = [
             'facebook' => '1',
             'twitter' => '2',
             'blog' => '3',
             'news' => '4',
             'video' => '5',
             'forum' => '9'
        ];

        return $arrMedia[$name];
    }

}