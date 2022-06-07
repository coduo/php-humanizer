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
    /**
     * @var int
     */
    public const MIN_VALUE = 1;

    /**
     * @var int
     */
    public const MAX_VALUE = 3999;

    /**
     * @var string
     */
    public const ROMAN_STRING_MATCHER = '/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/';

    /**
     * @var array<string, int>
     */
    private array $map = [
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
     * @param numeric $number
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function toRoman($number) : string
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
     * @throws \InvalidArgumentException
     *
     * @return float|int
     */
    public function fromRoman(string $string)
    {
        if (\mb_strlen($string) === 0 || 0 === \preg_match(self::ROMAN_STRING_MATCHER, $string)) {
            throw new \InvalidArgumentException();
        }

        $total = 0;
        $i = \mb_strlen($string);

        while ($i > 0) {
            $digit = $this->map[$string[--$i]];

            if ($i > 0) {
                $previousDigit = $this->map[$string[$i - 1]];

                if ($previousDigit < $digit) {
                    $digit -= $previousDigit;
                    $i--;
                }
            }

            $total += $digit;
        }

        return $total;
    }
}
