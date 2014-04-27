<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class Week implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'week';
    }

    public function getMilliseconds()
    {
        $day = new Day();
        return $day->getMilliseconds() * 7;
    }
}
