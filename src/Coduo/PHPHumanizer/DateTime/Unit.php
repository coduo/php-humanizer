<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

interface Unit
{
    public function getName() : string;

    /**
     * Return millisecond that represents unit.
     */
    public function getMilliseconds() : int;

    /**
     * Returns symbol of \DateInterval equivalent.
     */
    public function getDateIntervalSymbol() : string;
}
