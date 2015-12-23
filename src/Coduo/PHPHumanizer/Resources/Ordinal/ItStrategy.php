<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class ItStrategy implements StrategyInterface
{
    /** {@inheritdoc} */
    public function ordinalSuffix($number)
    {
        return 'o';
    }
}
