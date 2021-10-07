<?php


namespace App\Services;


class DateTimeService
{
    public function createDatesArray($numDays): array
    {
        $dates = [];
        for ($i = 0; $i < $numDays; $i++) {
            $dates[] = new \DateTime("+$i days");
        }

        return $dates;
    }
}
