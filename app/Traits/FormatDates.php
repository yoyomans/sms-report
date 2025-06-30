<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDates
{
    /**
     * Formats the raw date time into a date time string so we can save it to the db
     *
     * Example:
     *  '2025-05-10T16:30:22.067815Z' => '2025-05-10 16:30:22'
     */
    protected function toDateTimeString(string $dateTime): string
    {
        return Carbon::parse($dateTime)->toDateTimeString();
    }
}
