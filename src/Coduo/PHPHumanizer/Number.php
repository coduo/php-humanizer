<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\Number\Ordinal;
use Coduo\PHPHumanizer\Number\RomanNumeral;
use Coduo\PHPHumanizer\Number\NumberSpeller;
use Coduo\PHPHumanizer\String\BinarySuffix;
use Coduo\PHPHumanizer\String\MetricSuffix;
use Coduo\PHPHumanizer\Translator\Builder;

class Number
{
    public static function ordinalize($number)
    {
        return $number.self::ordinal($number);
    }

    public static function ordinal($number)
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

    public function spell($number, $locale = 'en')
    {
        $numberSpeller = new NumberSpeller(Builder::build($locale));

        return $numberSpeller->spell($number, $locale);
    }

    public static function toRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->toRoman($number);
    }

    public function fromRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->fromRoman($number);
    }
}
