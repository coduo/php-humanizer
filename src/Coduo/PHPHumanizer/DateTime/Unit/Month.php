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

final class Month implements Unit
{
    public function getName() : string
    {
        return 'month';
    }

    public function getMilliseconds() : int
    {
        $day = new Day();

        return $day->getMilliseconds() * 30;
    }

    public function getDateIntervalSymbol() : string
    {
        return 'm';
    }
}
