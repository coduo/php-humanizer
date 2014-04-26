<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class Minute implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'minute';
    }

    public function getMilliseconds()
    {
        $second = new Second();

        return $second->getMilliseconds() * $second->getThresholdQuantity();
    }

    /**
     * @return int
     */
    public function getThresholdQuantity()
    {
        return 60;
    }
}
