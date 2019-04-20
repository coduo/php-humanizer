<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class BinarySuffix
{
    const CONVERT_THRESHOLD = 1024;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var array
     */
    private $binaryPrefixes = [
        1125899906842624 => '#.## PB',
        1099511627776 => '#.## TB',
        1073741824 => '#.## GB',
        1048576 => '#.## MB',
        1024 => '#.# kB',
        0 => '# bytes',
    ];

    /**
     * @param int    $number
     * @param string $locale
     * @param int    $precision
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, $locale = 'en', $precision = null)
    {
        if (!\class_exists('NumberFormatter')) {
            throw new \RuntimeException('Binary suffix converter requires intl extension!');
        }

        if (!\is_numeric($number)) {
            throw new \InvalidArgumentException('Binary suffix converter accept only numeric values.');
        }

        if (!\is_null($precision)) {
            $this->setSpecificPrecisionFormat($precision);
        }

        $this->number = (int) $number;
        $this->locale = $locale;

        /*
         * Workaround for 32-bit systems which ignore array ordering when
         * dropping values over 2^32-1
         */
        \krsort($this->binaryPrefixes);
    }

    public function convert()
    {
        $formatter = new \NumberFormatter($this->locale, \NumberFormatter::PATTERN_DECIMAL);
        if ($this->number < 0) {
            return $this->number;
        }

        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size <= $this->number) {
                $value = ($this->number >= self::CONVERT_THRESHOLD) ? $this->number / (double) $size : $this->number;
                $formatter->setPattern($unitPattern);

                return $formatter->format($value);
            }
        }

        return $formatter->format($this->number);
    }

    /**
     * Replaces the default ICU 56.1 decimal formats defined in $binaryPrefixes with ones that provide the same symbols
     * but the provided number of decimal places.
     *
     * @param int $precision
     *
     * @throws \InvalidArgumentException
     */
    protected function setSpecificPrecisionFormat($precision)
    {
        if ($precision < 0) {
            throw new \InvalidArgumentException('Precision must be positive');
        }
        if ($precision > 3) {
            throw new \InvalidArgumentException('Invalid precision. Binary suffix converter can only represent values in '.
                'up to three decimal places');
        }

        $icuFormat = '#';
        if ($precision > 0) {
            $icuFormat .= \str_pad('#.', (2 + $precision), '0');
        }

        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size >= 1024) {
                $symbol = \substr($unitPattern, \strpos($unitPattern, ' '));
                $this->binaryPrefixes[$size] = $icuFormat.$symbol;
            }
        }
    }
}
