<?php

declare(strict_types=1);

namespace Coduo\PHPHumanizer\Number\Ordinal;

interface StrategyInterface
{
    /**
     * @return boolean
     */
    public function isPrefix();

    /**
     * @param int|float $number
     *
     * @return string
     */
    public function ordinalIndicator($number);
}
