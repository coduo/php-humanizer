<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime\Unit;

use Coduo\PHPHumanizer\DateTime\Unit;

final class Week implements Unit
{
    public function getName() : string
    {
        return 'week';
    }

    public function getMilliseconds() : int
    {
        $day = new Day();

        return $day->getMilliseconds() * 7;
    }

    public function getDateIntervalSymbol() : string
    {
        throw new \RuntimeException("Week doesn't have date interval symbol equivalent");
    }
}
