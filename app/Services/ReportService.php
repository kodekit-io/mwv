<?php

namespace App;

use Carbon\Carbon;

class ReportService
{
    protected  $apiService;

    /**
     * ReportService constructor.
     * @param $apiService
     */
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function createReport(array $inputs)
    {
        $apiMode = config('services.mediawave.api_mode');
        if ($apiMode == 'PRODUCTION') {
            $startDate = $inputs['start_date'];
            $startDate = Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d');
            $endDate = $inputs['end_date'];
            $endDate = Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d');
            $media = $inputs['media'];
            if ($media == '') {
                $media = '1,2,3,4,5,6';
            }
            $widgets = $inputs['widgets'];
            if ($widgets == '') {
                $widgets = '1,2,3,4,5,6,12,8,9,F,E';
            } else {
                $widgets = implode(',', $widgets);
            }

            $params['name'] = $inputs['report_name'];
            $params['desc'] = $inputs['report_desc'];
            $params['StartDate'] = $startDate;
            $params['EndDate'] = $endDate;
            $params['pid'] = $inputs['project'];
            $params['brandID'] = $inputs['keyword'];
            $params['mediaID'] = $media;
            $params['widgetID'] = $widgets;

            $reportResponse = $this->apiService->post('report/create', $params);
            return $reportResponse;
        }

        $faker = new FakeResult();
        $fakeResult = $faker->report()->fakeCreate();
        return \GuzzleHttp\json_decode($fakeResult);
    }

    public function getReports()
    {
        $apiMode = config('services.mediawave.api_mode');
        if ($apiMode == 'PRODUCTION') {
            $params = [
                'uid'  => \Auth::user()->id
            ];
            return $this->apiService->post('report/view', $params);
        }

        $faker = new FakeResult();
        $fakeResult = $faker->report()->fakeReports();
        return \GuzzleHttp\json_decode($fakeResult);
    }

    public function delete($reportId)
    {
        $apiMode = config('services.mediawave.api_mode');
        if ($apiMode == 'PRODUCTION') {
            $params = [
                'id'  => $reportId
            ];
            return $this->apiService->post('report/delete', $params);
        }

        $faker = new FakeResult();
        $fakeResult = $faker->report()->fakeDelete();
        return \GuzzleHttp\json_decode($fakeResult);
    }
}