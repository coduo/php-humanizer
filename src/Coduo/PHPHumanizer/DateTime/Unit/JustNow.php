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

final class JustNow implements Unit
{
    public function getName(): string
    {
        return 'just_now';
    }

    public function getMilliseconds(): int
    {
        return 0;
    }

    public function getDateIntervalSymbol(): string
    {
        throw new \RuntimeException("JustNow doesn't have date interval symbol equivalent");
    }
}
