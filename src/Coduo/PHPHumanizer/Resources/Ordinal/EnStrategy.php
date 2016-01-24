<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class EnStrategy implements StrategyInterface
{
    /** 
     * {@inheritdoc}
     */
    public function isPrefix()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function ordinalIndicator($number)
    {
        $absNumber = abs((integer) $number);

        if (in_array(($absNumber % 100), array(11, 12, 13), true)) {
            return 'th';
        }

        switch ($absNumber % 10) {
            case 1:  return 'st';
            case 2:  return 'nd';
            case 3:  return 'rd';
            default: return 'th';
        }
    }
}
