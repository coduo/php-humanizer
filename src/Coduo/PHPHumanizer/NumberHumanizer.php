<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\Number\Ordinal;
use Coduo\PHPHumanizer\Number\RomanNumeral;
use Coduo\PHPHumanizer\String\BinarySuffix;
use Coduo\PHPHumanizer\String\MetricSuffix;

final class NumberHumanizer
{
    /**
     * @param int|float $number
     * @param string    $locale
     *
     * @return string
     */
    public static function ordinalize($number, $locale = 'en')
    {
        $ordinal = new Ordinal($number, $locale);
     
        return (string) ($ordinal->isPrefix()) ? $ordinal.$number : $number.$ordinal;
    }
    
    /**
     * @param int|float $number
     * @param string    $locale
     *
     * @return string
     */
    public static function ordinal($number, $locale = 'en')
    {
        $ordinal = new Ordinal($number, $locale);
       
        return (string) $ordinal;
    }

    /**
     * @param $number
     * @param string $locale
     * @return bool|int|string
     */
    public static function binarySuffix($number, $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale);

        return $binarySuffix->convert();
    }

    /**
     * @param $number
     * @param $precision
     * @param string $locale
     * @return bool|int|string
     */
    public static function preciseBinarySuffix($number, $precision, $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale, $precision);

        return $binarySuffix->convert();
    }

    /**
     * @param $number
     * @param string $locale
     * @return bool|string
     */
    public static function metricSuffix($number, $locale = 'en')
    {
        $binarySuffix = new MetricSuffix($number, $locale);

        return $binarySuffix->convert();
    }

    /**
     * @param $number
     * @return string
     */
    public static function toRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->toRoman($number);
    }

    /**
     * @param $number
     * @return int
     */
    public static function fromRoman($number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->fromRoman($number);
    }
}
