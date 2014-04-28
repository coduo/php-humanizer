<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class JustNow implements Unit
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
}
