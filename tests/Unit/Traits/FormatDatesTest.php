<?php

use App\Traits\FormatDates;

beforeEach(function () {
    $this->trait = new class {
        use FormatDates;

        public function toDateTimeStringPublic(string $input): string
        {
            return $this->toDateTimeString($input);
        }
    };
});

it('converts ISO datetime to MySQL format', function () {
    expect($this->trait->toDateTimeStringPublic('2025-05-10T16:30:22.067815Z'))
        ->toBe('2025-05-10 16:30:22');
});

it('returns string unchanged if already valid format', function () {
    expect($this->trait->toDateTimeStringPublic('2025-06-01 12:00:00'))
        ->toBe('2025-06-01 12:00:00');
});
