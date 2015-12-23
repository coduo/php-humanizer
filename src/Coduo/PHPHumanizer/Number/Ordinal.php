<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class Ordinal
{
    /**
     * @var int|float
     */
    private $number;

    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * @param int|float $number
     * @param string    $locale
     */
    public function __construct($number, $locale)
    {
        $this->number = $number;
        $this->strategy = Builder::build($locale);
    }

    public function isPrefix()
    {
        return $this->strategy->isPrefix();
    }

    public function __toString()
    {
        return $this
            ->strategy
            ->ordinalIndicator($this->number);
    }
}