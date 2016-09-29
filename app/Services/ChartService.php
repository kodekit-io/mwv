<?php

namespace App;


use Carbon\Carbon;

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
    public function __construct(ApiService $apiService, FakeResult $fakeResult)
    {
        $this->apiService = $apiService;
        $this->fakeResult = $fakeResult;
        $this->apiMode = config('services.mediawave.api_mode');
    }

    public function projectChart($projectId, $chartIds, $startDate = null, $endDate = null)
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d');
        $startDate = (!is_null($startDate)) ? $startDate : $lastSevenDays;
        $endDate = (!is_null($endDate)) ? $endDate : date('Y-m-d');
        $params = [
            'pid' => $projectId,
            'widgetID' => $chartIds,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'sentiment' => '1,0,-1'
        ];

        return $this->getChart($params);
    }

    public function getChart($params)
    {
        if ($this->apiMode == 'PRODUCTION') {
            return $this->apiService->post('dashboard/analytics/charts', $params, true);
        }
        $fakeResult = $this->fakeResult->fakeChart($params['widgetID']);
        return \GuzzleHttp\json_decode($fakeResult);
    }

    public function getBuzzData($chartResult)
    {
        $dateRange = $this->getDateRange();
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

    public function wordCloud($projectId, $startDate = null, $endDate = null)
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d');
        $startDate = (!is_null($startDate)) ? $startDate : $lastSevenDays;
        $endDate = (!is_null($endDate)) ? $endDate : date('Y-m-d');
        $params = [
            'pid' => $projectId,
            'widgetID' => 7,
            'StartDate' => $startDate,
            'EndDate' => $endDate
        ];

        return $this->getChart($params);
    }

    public function viewInfluencer($projectId, $startDate = null, $endDate = null)
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d');
        $startDate = (!is_null($startDate)) ? $startDate : $lastSevenDays;
        $endDate = (!is_null($endDate)) ? $endDate : date('Y-m-d');
        $params = [
            'pid' => $projectId,
            'widgetID' => 'E',
            'StartDate' => $startDate,
            'EndDate' => $endDate
        ];

        return $this->getChart($params);
    }

    private function getDateRange()
    {
        $arrDays = [];
//        $now = Carbon::today();
//        $loopDay = $now->copy()->subDays(7);
        $loopDay = Carbon::createFromFormat('Y-m-d', '2016-08-21');
        $now = Carbon::createFromFormat('Y-m-d', '2016-09-04');
        for ($loopDay; $loopDay->lte($now); $loopDay->addDay()) {
            $arrDays[] = $loopDay->format('Y-m-d');
        }
        return $arrDays;
    }



}