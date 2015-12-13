<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class Second implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'second';
    }

    public function getMilliseconds()
    {
        return 1000;
    }

    public function getDateIntervalSymbol()
    {
        return 's';
    }
}
