<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

class NlStrategy implements StrategyInterface
{
    /** @inheritdoc */
    public function ordinalSuffix($number)
    {
        return "e";
    }
}
