<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class Hour implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'hour';
    }

    public function getMilliseconds()
    {
        $minute = new Minute();

        return $minute->getMilliseconds() * 60;
    }

    public function getDateIntervalSymbol()
    {
        return 'h';
    }
}
