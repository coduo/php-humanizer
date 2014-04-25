<?php

namespace PHPHumanizer;

use PHPHumanizer\Number\Ordinal;
use PHPHumanizer\String\BinarySuffix;
use PHPHumanizer\String\MetricSuffix;

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

    public static function binarySuffix($number, $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale);
        return $binarySuffix->convert();
    }

    public static function metricSuffix($number, $locale = 'en')
    {
        $binarySuffix = new MetricSuffix($number, $locale);
        return $binarySuffix->convert();
    }
}
