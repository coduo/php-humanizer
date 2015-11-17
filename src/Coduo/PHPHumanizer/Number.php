<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\Number\Ordinal;
use Coduo\PHPHumanizer\Number\RomanNumeral;
use Coduo\PHPHumanizer\String\BinarySuffix;
use Coduo\PHPHumanizer\String\MetricSuffix;

class Number
{
    public static function ordinalize($number, $locale = 'en')
    {
        if ($locale == 'id'){
            return self::ordinal($number, 'id').$number;
        }
        return $number.self::ordinal($number, $locale);
    }

    public static function ordinal($number, $locale = 'en')
    {
        return (string) new Ordinal($number, $locale);
    }

    public static function binarySuffix($number, $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale);

        return $binarySuffix->convert();
    }

    public static function preciseBinarySuffix($number, $precision, $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale, $precision);

        return $binarySuffix->convert();
    }

    public static function metricSuffix($number, $locale = 'en')
    {
        $binarySuffix = new MetricSuffix($number, $locale);

        return $binarySuffix->convert();
    }

    public static function toRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->toRoman($number);
    }

    public static function fromRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->fromRoman($number);
    }
}
