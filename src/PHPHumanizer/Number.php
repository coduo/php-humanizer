<?php

namespace PHPHumanizer;

use PHPHumanizer\Number\Ordinal;

class Number
{
    public static function ordinalize($number)
    {
        return $number . self::oridinal($number);
    }

    public static function oridinal($number)
    {
        return (string) new Ordinal($number);
    }
}
