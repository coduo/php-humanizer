<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class JustNow implements Unit
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'just_now';
    }

    public function getMilliseconds()
    {
        return 0;
    }

    public function getDateIntervalSymbol()
    {
        throw new \RuntimeException("JustNow doesn't have date interval symbol equivalent");
    }
}
