<?php

use Carbon\Carbon;

if (!function_exists('getTimeZonesByHour')) {
    function getTimeZonesByHour(int $hour)
    {
        $timezones = [];

        foreach (\DateTimeZone::listIdentifiers() as $tz) {
            $time = Carbon::now($tz);

            if ($time->hour === $hour) {
                $timezones[] = $tz;
            }
        }

        return $timezones;
    }
}
