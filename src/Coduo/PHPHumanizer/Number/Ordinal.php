<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

class Ordinal
{
    /**
     * @type int|float
     */
    private $number;

    /**
     * @type StrategyInterface
     */
    private $strategy;

    /**
     * @param int|float $number
     * @param string $locale
     */
    public function __construct($number, $locale)
    {
        $this->number = $number;
        $this->strategy = Builder::build($locale);
    }

    public function __toString()
    {
        return $this
            ->strategy
            ->ordinalSuffix($this->number);
    }
}
