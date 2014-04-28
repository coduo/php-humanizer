<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class Month implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'month';
    }

    public function getMilliseconds()
    {
        $day = new Day();
        return $day->getMilliseconds() * 30;
    }
}
