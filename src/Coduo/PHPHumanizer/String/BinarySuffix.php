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
    /**
     * @var int
     */
    public const CONVERT_THRESHOLD = 1024;

    private int $number;

    private string $locale;

    /**
     * @var array<int, string>
     */
    private array $binaryPrefixes = [
        1_125_899_906_842_624 => '#.## PB',
        1_099_511_627_776 => '#.## TB',
        1_073_741_824 => '#.## GB',
        1_048_576 => '#.## MB',
        1024 => '#.# kB',
        0 => '# bytes',
    ];

    public function __construct(int $number, string $locale = 'en', int $precision = null)
    {
        if (!\class_exists(\NumberFormatter::class)) {
            throw new \RuntimeException('Binary suffix converter requires intl extension!');
        }

        if (null !== $precision) {
            $this->setSpecificPrecisionFormat($precision);
        }

        $this->number = $number;
        $this->locale = $locale;

        /*
         * Workaround for 32-bit systems which ignore array ordering when
         * dropping values over 2^32-1
         */
        \krsort($this->binaryPrefixes);
    }

    /**
     * @return int|string
     */
    public function convert()
    {
        $formatter = new \NumberFormatter($this->locale, \NumberFormatter::PATTERN_DECIMAL);

        if ($this->number < 0) {
            return $this->number;
        }

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

    /**
     * Replaces the default ICU 56.1 decimal formats defined in $binaryPrefixes with ones that provide the same symbols
     * but the provided number of decimal places.
     */
    private function setSpecificPrecisionFormat(int $precision) : void
    {
        if ($precision < 0) {
            throw new \InvalidArgumentException('Precision must be positive');
        }

        if ($precision > 3) {
            throw new \InvalidArgumentException('Invalid precision. Binary suffix converter can only represent values in ' .
                'up to three decimal places');
        }

        $icuFormat = '#';

        if ($precision > 0) {
            $icuFormat .= \str_pad('#.', (2 + $precision), '0');
        }

        foreach ($this->binaryPrefixes as $size => $unitPattern) {
            if ($size >= 1024) {
                $symbol = \substr($unitPattern, (int) \strpos($unitPattern, ' '));
                $this->binaryPrefixes[$size] = $icuFormat . $symbol;
            }
        }
    }
}
