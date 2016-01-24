<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class IdStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function isPrefix()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function ordinalIndicator($number)
    {
        return 'ke-';
    }
}
