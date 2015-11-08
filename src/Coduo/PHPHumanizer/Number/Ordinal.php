<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

class Ordinal
{
    /** @type float|int */
    private $number;

    /** @var StrategyInterface */
    private $strategy;

    /**
     * @param float|int $number
     * @param string $locale
     */
    public function __construct($number, $locale)
    {
        $this->number = $number;
        $this->strategy = Builder::build($locale);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this
            ->strategy
            ->ordinalSuffix($this->number);
    }
}
