<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait ProjectRequestParser
{
    function parseRequest(Request $request, $projectId)
    {
        $brands = '';
        $last7DaysRange = $this->chartService->getLastSevenDaysRange();
        $startDate = $last7DaysRange['startDate'];
        $endDate = $last7DaysRange['endDate'];
        $shownSearch = '';
        if ($request->has('filter')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $startDate = ( $startDate != '' ) ? Carbon::createFromFormat('d/m/y', $startDate)->format('Y-m-d\TH:i:s\Z') : null;
            $endDate = ( $endDate != '' ) ? Carbon::createFromFormat('d/m/y', $endDate)->format('Y-m-d\TH:i:s\Z') : null;
            $brands = ( $request->has('keywords') ? implode(',', $request->input('keywords')) : '' );
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

        $data['shownSearch'] = $shownSearch;
        $data['brands'] = $brands;
        $data['project'] = $profiles->project;
        $data['keywords'] = $keywords;
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