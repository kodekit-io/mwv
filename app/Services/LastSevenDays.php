<?php

namespace App;

use Carbon\Carbon;

trait LastSevenDays
{
    public function getLastSevenDaysRange()
    {
        $lastSevenDays = Carbon::today()->subDay(7)->format('Y-m-d');
        $startDate = $lastSevenDays;
        $endDate = date('Y-m-d');
        return [
            'startDate' => $startDate,
            'endDate' => $endDate
        ];
    }
}