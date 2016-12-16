<?php

namespace App;

trait KeywordSelected {

    protected function isKeywordSelected($keywordId, $request)
    {
        $select = '';
        if ($request->has('keywords')) {
            if (in_array($keywordId, $request->input('keywords'))) {
                $select = 'checked';
            }
        } else {
            $select = 'checked';
        }
        return $select;
    }

    protected function isSentimentSelected($sentiment, $request)
    {
        $select = '';
        if ($request->has('sentiments')) {
            if (in_array($sentiment, $request->input('sentiments'))) {
                $select = 'checked';
            }
        } else {
            $select = 'checked';
        }
        return $select;
    }

}