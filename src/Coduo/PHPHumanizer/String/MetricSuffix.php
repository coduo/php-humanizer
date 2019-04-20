<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class MetricSuffix
{
    const CONVERT_THRESHOLD = 1000;

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
        1000000000000000 => '#.##P',
        1000000000000 => '#.##T',
        1000000000 => '#.##G',
        1000000 => '#.##M',
        1000 => '#.#k',
        0 => '#.#',
    ];

    /**
     * @param $number
     * @param string $locale
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, $locale = 'en')
    {
        if (!\class_exists('NumberFormatter')) {
            throw new \RuntimeException('Metric suffix converter requires intl extension!');
        }

        if (!\is_numeric($number)) {
            throw new \InvalidArgumentException('Metric suffix converter accept only numeric values.');
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

        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size <= $this->number) {
                $value = ($this->number >= self::CONVERT_THRESHOLD) ? $this->number / (double) $size : $this->number;
                $formatter->setPattern($unitPattern);

                return $formatter->format($value);
            }
        }

        return $formatter->format($this->number);
    }
}
