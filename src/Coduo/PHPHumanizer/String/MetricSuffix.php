<?php

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
    private $binaryPrefixes = array(
        1000000000000000 => '#.##P',
        1000000000000 => '#.##T',
        1000000000 => '#.##G',
        1000000 => '#.##M',
        1000 => '#.#k',
        0 => '#.#',
    );

    /**
     * @param $number
     * @param string $locale
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($number, $locale = 'en')
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Metric suffix converter accept only numeric values.');
        }

        $this->number = (int) $number;
        $this->locale = $locale;
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
