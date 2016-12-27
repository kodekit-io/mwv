<?php

namespace App;

use Carbon\Carbon;

trait LastSevenDays
{
    public function getLastSevenDaysRange()
    {
//        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d\TH:i:s\Z');
//        $startDate = $lastSevenDays;
//        $endDate = date('Y-m-d\TH:i:s\Z');
        $startDate = Carbon::createFromFormat('Y-m-d', '2016-11-13')->format('Y-m-d\TH:i:s\Z');
        $endDate = Carbon::createFromFormat('Y-m-d', '2016-11-15')->format('Y-m-d\TH:i:s\Z');
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}