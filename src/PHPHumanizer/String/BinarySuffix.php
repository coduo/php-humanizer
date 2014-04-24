<?php

namespace PHPHumanizer\String;

class BinarySuffix
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
    private $binaryPrefixes = array(
        1125899906842624 => '#.## PB',
        1099511627776 => '#.## TB',
        1073741824 => '#.## GB',
        1048576 => '#.## MB',
        1024 => '#.# kB',
        0 => '# bytes'
    );

    /**
     * @param $number
     * @param string $locale
     * @throws \RuntimeException
     */
    public function __construct($number, $locale = 'en')
    {
        if (!is_numeric($number)) {
            throw new \RuntimeException("binarySuffix converter accept only numeric values.");
        }

        $this->number = (int) $number;
        $this->locale = $locale;
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
}
