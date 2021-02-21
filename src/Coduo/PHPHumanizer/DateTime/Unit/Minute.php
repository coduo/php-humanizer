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

final class Minute implements Unit
{
    public function getName(): string
    {
        return 'minute';
    }

    public function getMilliseconds(): int
    {
        $second = new Second();

        return $second->getMilliseconds() * 60;
    }

    public function getDateIntervalSymbol(): string
    {
        return 'i';
    }
}
