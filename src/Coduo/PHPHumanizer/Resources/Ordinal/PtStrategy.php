<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Resources\Ordinal;

use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class PtStrategy implements StrategyInterface
{
    public function isPrefix() : bool
    {
        return false;
    }

    public function ordinalIndicator($number) : string
    {
        return 'o';
    }
}
