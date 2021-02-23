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
     * @param float|int $number
     * @param string $locale
     *
     * @return string
     */
    public static function ordinalize($number, string $locale = 'en') : string
    {
        $ordinal = new Ordinal($number, $locale);

        return (string) ($ordinal->isPrefix()) ? $ordinal . $number : $number . $ordinal;
    }

    /**
     * @param float|int $number
     * @param string $locale
     *
     * @return string
     */
    public static function ordinal($number, string $locale = 'en') : string
    {
        $ordinal = new Ordinal($number, $locale);

        return (string) $ordinal;
    }

    /**
     * @param int $number
     * @param string $locale
     *
     * @return bool|int|string
     */
    public static function binarySuffix(int $number, string $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale);

        return $binarySuffix->convert();
    }

    /**
     * @return bool|int|string
     */
    public static function preciseBinarySuffix(int $number, ?int $precision, string $locale = 'en')
    {
        $binarySuffix = new BinarySuffix($number, $locale, $precision);

        return $binarySuffix->convert();
    }

    /**
     * @param numeric $number
     */
    public static function metricSuffix($number, string $locale = 'en') : string
    {
        $binarySuffix = new MetricSuffix($number, $locale);

        return $binarySuffix->convert();
    }

    /**
     * @param numeric $number
     *
     * @return string
     */
    public static function toRoman($number) : string
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->toRoman($number);
    }

    /**
     * @return float|int
     */
    public static function fromRoman(string $number)
    {
        $romanNumeral = new RomanNumeral();

        return $romanNumeral->fromRoman($number);
    }
}
