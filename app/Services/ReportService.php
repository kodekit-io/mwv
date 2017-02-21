<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        $startDate = $inputs['start_date'];
        $startDate = Carbon::createFromFormat('d/m/y', $startDate)->setTime(00, 00, 01)->format('Y-m-d\TH:i:s\Z');
        $endDate = $inputs['end_date'];
        $endDate = Carbon::createFromFormat('d/m/y', $endDate)->setTime(23, 59, 59)->format('Y-m-d\TH:i:s\Z');
        Log::warning("Start Date => " . \GuzzleHttp\json_encode($startDate));
        Log::warning("End Date => " . \GuzzleHttp\json_encode($endDate));
/*
        $startDate = $inputs['start_date'];
        $startDate = Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d\TH:i:s\Z');
        $endDate = $inputs['end_date'];
        $endDate = Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d\TH:i:s\Z');

        $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->setTime(00, 00, 01)->format('Y-m-d\TH:i:s\Z') : null;
        Log::warning("Start Date => " . \GuzzleHttp\json_encode($startDate));
        $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->setTime(23, 59, 59)->format('Y-m-d\TH:i:s\Z') : null;
        Log::warning("End Date => " . \GuzzleHttp\json_encode($endDate));
*/
        $reportDate = Carbon::now()->format('Y-m-d\TH:i:s\Z');
        $reportType = $inputs['report_type'];
        $keywords = $inputs['keyword'] == '' ? '0' : $inputs['keyword'];

        $params['reportType'] = $reportType;
        $params['reportDate'] = $reportDate;
        $params['name'] = $inputs['report_name'];
        $params['description'] = $inputs['report_desc'];
        $params['pid'] = isset($inputs['project']) ? $inputs['project'] : '';
        $params['brandID'] = $keywords;
        $params['StartDate'] = $startDate;
        $params['EndDate'] = $endDate;
        $params['account'] = isset($inputs['account']) ? $inputs['account'] : '';

        $charts =  array_except($inputs,
            ['report_name', 'report_type', 'report_desc', 'start_date', 'end_date', 'project',
                'keyword', 'account', 'allprojectFacebook', 'allprojectTwitter', 'allprojectBlog', 'allprojectNews',
                'allprojectVideo', 'allprojectForum', 'allprojectInstagram', 'allprojectAll Media', 'allprojectYoutube']
        );

        $chartString = '';
        foreach ($charts as $chart => $val) {
            $chartString .= $chartString != '' ? ', ' : '';
            $chartString .= $chart;
        }

        if ($chartString != '') {
            $params['chartList'] = $chartString;
        }

        Log::warning('URL =====> project/newreport');
        Log::warning('params ====> ' . \GuzzleHttp\json_encode($params));

        $ret = $this->apiService->post('project/newreport', $params);
        //$ret = new \stdClass();
        //$ret->status = 'OK';
        //$ret->msg = 'Report has been created.';

        return $ret;
    }

    public function createReportOld(array $inputs)
    {
        $apiMode = config('services.mediawave.api_mode');
        if ($apiMode == 'PRODUCTION') {
            $startDate = $inputs['start_date'];
            $startDate = Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d\TH:i:s\Z');
            $endDate = $inputs['end_date'];
            $endDate = Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d\TH:i:s\Z');
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