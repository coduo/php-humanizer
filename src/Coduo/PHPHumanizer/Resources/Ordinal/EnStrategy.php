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

final class EnStrategy implements StrategyInterface
{
    public function isPrefix() : bool
    {
        return false;
    }

    public function ordinalIndicator($number) : string
    {
        $absNumber = \abs((int) $number);

        if (\in_array(($absNumber % 100), [11, 12, 13], true)) {
            return 'th';
        }

        switch ($absNumber % 10) {
            case 1:  return 'st';
            case 2:  return 'nd';
            case 3:  return 'rd';

            default: return 'th';
        }
    }
}
