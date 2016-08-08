<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class FrStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function isPrefix()
    {
        return false;
    }

    /** {@inheritdoc} */
    public function ordinalIndicator($number)
    {
        $absNumber = abs((integer) $number);

        if ($absNumber == 1) {
            return 'er';
        } else {
            return 'e';
        }
    }
}
