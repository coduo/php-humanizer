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
    /**
     * @return string
     */
    public function getName();

    /**
     * Return millisecond that represents unit.
     *
     * @return int
     */
    public function getMilliseconds();

    /**
     * Returns symbol of \DateInterval equivalent.
     *
     * @return string
     */
    public function getDateIntervalSymbol();
}
