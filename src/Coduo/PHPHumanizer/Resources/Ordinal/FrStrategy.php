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

final class FrStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function isPrefix()
    {
        return false;
    }

    /** {@inheritdoc} */
    public function ordinalIndicator($number)
    {
        $absNumber = \abs((integer) $number);

        if ($absNumber == 1) {
            return 'er';
        } else {
            return 'e';
        }
    }
}
