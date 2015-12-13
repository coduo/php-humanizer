<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class Year implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'year';
    }

    public function getMilliseconds()
    {
        $day = new Day();

        return $day->getMilliseconds() * 356;
    }

    public function getDateIntervalSymbol()
    {
        return 'y';
    }
}
