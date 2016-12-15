<?php

namespace App;

use Carbon\Carbon;

trait LastSevenDays
{
    public function getLastSevenDaysRange()
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d\TH:i:s\Z');
        $startDate = $lastSevenDays;
        $endDate = date('Y-m-d\TH:i:s\Z');
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}