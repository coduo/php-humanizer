<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Number\Ordinal;

interface StrategyInterface
{
    /**
     * @return boolean
     */
    public function isPrefix();

    /**
     * @param int|float $number
     *
     * @return string
     */
    public function ordinalIndicator($number);
}
