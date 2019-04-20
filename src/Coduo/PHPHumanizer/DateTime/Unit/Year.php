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
