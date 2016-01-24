<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class NlStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function isPrefix()
    {
        return False;
    }

    /**
     * {@inheritdoc}
     */
    public function ordinalIndicator($number)
    {
        return 'e';
    }
}
