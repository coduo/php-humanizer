<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

interface Breakpoint
{
    /**
     * Return the length of the truncated $text depending on the $characterCount.
     */
    public function calculatePosition(string $text, int $charactersCount): int;
}
