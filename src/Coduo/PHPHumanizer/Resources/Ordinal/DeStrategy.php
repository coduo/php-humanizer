<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class DeStrategy implements StrategyInterface
{
    /** {@inheritdoc} */
    public function ordinalSuffix($number)
    {
        return '.';
    }
}
