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
    /**
     * @var int
     */
    public const CONVERT_THRESHOLD = 1000;

    private int $number;

    private string $locale;

    /**
     * @var array<int, string>
     */
    private array $binaryPrefixes = [
        1_000_000_000_000_000 => '#.##P',
        1_000_000_000_000 => '#.##T',
        1_000_000_000 => '#.##G',
        1_000_000 => '#.##M',
        1000 => '#.#k',
        0 => '#.#',
    ];

    /**
     * @param numeric $number
     * @param string $locale
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, string $locale = 'en')
    {
        if (!\class_exists(\NumberFormatter::class)) {
            throw new \RuntimeException('Metric suffix converter requires intl extension!');
        }

        /**
         * @psalm-suppress DocblockTypeContradiction
         */
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

    public function convert() : string
    {
        $formatter = new \NumberFormatter($this->locale, \NumberFormatter::PATTERN_DECIMAL);

        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size <= $this->number) {
                $value = ($this->number >= self::CONVERT_THRESHOLD) ? $this->number / (float) $size : $this->number;
                $formatter->setPattern($unitPattern);

                /** @phpstan-ignore-next-line  */
                return $formatter->format($value);
            }
        }

        /** @phpstan-ignore-next-line  */
        return $formatter->format($this->number);
    }
}
