<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait SocmedRequestParser
{
    protected function parseRequest(Request $request)
    {
        $brands = '';
        $last7DaysRange = $this->projectService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
        }

         $socmedAccounts = $this->profileService->getMediaAccounts();

        $keywords = [];
        if (count($socmedAccounts->mediaAkunList) > 0) {
            $accounts = $socmedAccounts->mediaAkunList;
            foreach ($accounts as $account) {
                $accId = $account->mediaAkunId;
                $accName = $account->keywordName;
                $keywords[$accId]['value'] = $accName;
                $keywords[$accId]['selected'] = $this->isKeywordSelected($accId, $request);
            }
        }

        // $wordcloudApi = $this->projectService->socialWordCloud(2);

        $data['keywords'] = $keywords;
        $data['brands'] = $brands;
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['shownStartDate'] = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/y');
        $data['shownEndDate'] = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/y');


        return $data;
    }
}