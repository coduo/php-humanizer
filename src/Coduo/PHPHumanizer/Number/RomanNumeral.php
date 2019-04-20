<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Number;

final class RomanNumeral
{
    const MIN_VALUE = 1;
    const MAX_VALUE = 3999;
    const ROMAN_STRING_MATCHER = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';

    private $map = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    /**
     * @param $number
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function toRoman($number)
    {
        if (($number < self::MIN_VALUE) || ($number > self::MAX_VALUE)) {
            throw new \InvalidArgumentException();
        }

        $romanString = '';

        while ($number > 0) {
            foreach ($this->map as $key => $value) {
                if ($number >= $value) {
                    $romanString .= $key;
                    $number -= $value;
                    break;
                }
            }
        }

        return $romanString;
    }

    /**
     * @param $string
     *
     * @return int
     *
     * @throws \InvalidArgumentException
     */
    public function fromRoman($string)
    {
        if (\mb_strlen((string) $string) === 0 || 0 === \preg_match(self::ROMAN_STRING_MATCHER, (string) $string)) {
            throw new \InvalidArgumentException();
        }

        $total = 0;
        $i = \mb_strlen($string);

        while ($i > 0) {
            $digit = $this->map[$string{--$i}];

            if ($i > 0) {
                $previousDigit = $this->map[$string{$i - 1}];

                if ($previousDigit < $digit) {
                    $digit -= $previousDigit;
                    --$i;
                }
            }

            $total += $digit;
        }

        return $total;
    }
}
