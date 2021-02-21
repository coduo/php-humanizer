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

final class Hour implements Unit
{
    public function getName(): string
    {
        return 'hour';
    }

    public function getMilliseconds(): int
    {
        $minute = new Minute();

        return $minute->getMilliseconds() * 60;
    }

    public function getDateIntervalSymbol(): string
    {
        return 'h';
    }
}
