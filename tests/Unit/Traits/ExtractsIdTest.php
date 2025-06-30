<?php

use App\Traits\ExtractsId;

beforeEach(function () {
    $this->trait = new class {
        use ExtractsId;

        public function extractIdPublic(string $input): int
        {
            return $this->extractId($input);
        }

        public function extractHexSuffixPublic(string $input): string
        {
            return $this->extractHexSuffix($input);
        }
    };
});

it('extracts numeric id from string', function () {
    expect($this->trait->extractIdPublic('student_id_068'))->toBe(68)
        ->and($this->trait->extractIdPublic('https://school_3.arbor/sms-receipt'))->toBe(3);
});

it('throws exception if no numeric id found', function () {
    $this->trait->extractIdPublic('no_id_here');
})->throws(InvalidArgumentException::class);

it('extracts hex suffix from string', function () {
    expect($this->trait->extractHexSuffixPublic('msg_26585dcf'))->toBe('26585dcf');
});

it('throws exception if no hex suffix found', function () {
    $this->trait->extractHexSuffixPublic('not_valid');
})->throws(InvalidArgumentException::class);
