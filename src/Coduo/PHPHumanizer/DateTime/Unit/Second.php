<?php

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

class Second implements Unit
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
}
