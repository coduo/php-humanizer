<?php

namespace Coduo\PHPHumanizer\Number\Ordinal;

interface StrategyInterface
{
    /**
     * @param int|float $number
     *
     * @return string
     */
    public function ordinalSuffix($number);
}
