<?php

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class SeStrategy implements StrategyInterface
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

        switch ($absNumber % 10) {
            case 1:  return ':a';
            case 2:  return ':a';
            default: return ':e';
        }
    }
}
