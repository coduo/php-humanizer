<?php

declare(strict_types=1);

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class Day implements Unit
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

        return $hour->getMilliseconds() * 24;
    }

    public function getDateIntervalSymbol()
    {
        return 'd';
    }
}
