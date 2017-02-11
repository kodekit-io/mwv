<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait SocmedRequestParser
{
    protected function parseRequest(Request $request, $idMedia = 1)
    {
        $brands = '';
        $sentiments = '';
        $last7DaysRange = $this->projectService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        $shownSearch = '';
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->setTime(00, 00, 01)->format('Y-m-d\TH:i:s\Z') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->setTime(23, 59, 59)->format('Y-m-d\TH:i:s\Z') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
            $sentiments = ( $request->has('sentiments') ? implode(',', $request->input('sentiments')) : '' );
            $shownSearch = $request->has('search') ? $request->input('search') : '';
        }

        $socmedAccounts = $this->profileService->getMediaAccounts($idMedia);

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

        $sentimentCheckboxes = [];
        $sentimentArrays = [
            ['1', 'pstv', 'Positive'],
            ['0', 'ntrl', 'Neutral'],
            ['-1', 'ngtv', 'Negative']
        ];
        foreach ($sentimentArrays as $sentiment) {
            $sentimentCheckboxes[$sentiment[1]]['value'] = $sentiment[0];
            $sentimentCheckboxes[$sentiment[1]]['checked'] = $this->isSentimentSelected($sentiment[0], $request);
            $sentimentCheckboxes[$sentiment[1]]['showName'] = $sentiment[2];
        }

        // $wordcloudApi = $this->projectService->socialWordCloud(2);
        $data['shownSearch'] = $shownSearch;
        $data['keywords'] = $keywords;
        $data['sentimentCheckboxes'] = $sentimentCheckboxes;
        $data['sentiments'] = $sentiments;
        $data['brands'] = $brands;
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['shownStartDate'] = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $startDate)->format('d/m/y');
        $data['shownEndDate'] = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $endDate)->format('d/m/y');


        return $data;
    }
}