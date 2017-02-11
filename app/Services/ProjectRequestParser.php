<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait ProjectRequestParser
{
    function parseRequest(Request $request, $projectId)
    {
        $brands = '';
        $sentiments = '';
        $last7DaysRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        $shownSearch = '';
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->setTime(00, 00, 01)->format('Y-m-d\TH:i:s\Z') : null;
            Log::warning("Start Date => " . \GuzzleHttp\json_encode($startDate));
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->setTime(23, 59, 59)->format('Y-m-d\TH:i:s\Z') : null;
            Log::warning("End Date => " . \GuzzleHttp\json_encode($endDate));
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
            $sentiments = ( $request->has('sentiments') ? implode(',', $request->input('sentiments')) : '' );
            $shownSearch = $request->has('search') ? $request->input('search') : '';
        }

        $profiles = $this->projectService->projectInfo($projectId);
        $wordCloud = $this->chartService->wordCloud($projectId, 2, $brands, $startDate, $endDate);
        $viewInfluencer = $this->chartService->viewInfluencer($projectId, '', $brands, $startDate, $endDate);

        $keywords = [];
        if (count($profiles->projectInfo->keywordList) > 0) {
            $keywordLists = $profiles->projectInfo->keywordList;
            foreach ($keywordLists as $keywordList) {
                $keywordId = $keywordList->keyword->keywordId;
                $keywordName = $keywordList->keyword->keywordName;
                $keywords[$keywordId]['value'] = $keywordName;
                $keywords[$keywordId]['selected'] = $this->isKeywordSelected($keywordId, $request);
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

        $data['shownSearch'] = $shownSearch;
        $data['brands'] = $brands;
        $data['project'] = $profiles->project;
        $data['keywords'] = $keywords;
        $data['sentimentCheckboxes'] = $sentimentCheckboxes;
        $data['sentiments'] = $sentiments;
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['shownStartDate'] = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $startDate)->format('d/m/y');
        $data['shownEndDate'] = Carbon::createFromFormat('Y-m-d\TH:i:s\Z', $endDate)->format('d/m/y');
        $data['projectId'] = $projectId;

        $dataUnion = ( isset($wordCloud->dataUnion) ? $wordCloud->dataUnion : '' );
        $data['wordCloud'] = \GuzzleHttp\json_encode($dataUnion);

        $data['viewInfluencers'] = $viewInfluencer->influencer;

        return $data;
    }
}