<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

class Ordinal
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * @param string $locale
     */
    public function __construct($locale)
    {
        $this->strategy = Builder::build($locale);
    }

    /**
     * @param $number
     * @return string
     */
    public function ordinal($number)
    {
        return $this
            ->strategy
            ->ordinalSuffix($number);
    }
}
