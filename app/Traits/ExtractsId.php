<?php

namespace App\Traits;

trait ExtractsId
{
    /**
     * Extracts the integer after the last underscore in a string.
     *
     * Examples:
     *  'student_id_068' => 68
     *  'https://school_3.arbor/sms-receipt' => 3
     */
    protected function extractId(string $input): int
    {
        if (preg_match('/_(\d+)(?!.*_)/', $input, $matches))
        {
            return (int) ltrim($matches[1], '0');
        }

        throw new \InvalidArgumentException("No numeric ID found in: {$input}");
    }

    /**
     * Extracts a hex suffix after the last underscore in a string.
     *
     * Examples:
     *  'msg_26585dcf' => '26585dcf'
     */
    protected function extractHexSuffix(string $input): string
    {
        if (preg_match('/_([a-f0-9]+)$/i', $input, $matches))
        {
            return strtolower($matches[1]);
        }

        throw new \InvalidArgumentException("No hex suffix found in: {$input}");
    }
}
