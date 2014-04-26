<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class Day implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'day';
    }

    public function getMilliseconds()
    {
        $hour = new Hour();
        return $hour->getMilliseconds() * $hour->getThresholdQuantity();
    }

    /**
     * @return int
     */
    public function getThresholdQuantity()
    {
        return 7;
    }
}
