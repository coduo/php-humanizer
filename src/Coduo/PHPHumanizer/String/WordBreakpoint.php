<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class WordBreakpoint implements Breakpoint
{
    public function calculatePosition(string $text, int $charactersCount): int
    {
        if ($charactersCount < 0) {
            return (int) \mb_strlen($text);
        }

        if ($charactersCount > \mb_strlen($text)) {
            return (int) \mb_strlen($text);
        }

        $breakpoint = \mb_strpos($text, ' ', $charactersCount);

        if (false === $breakpoint) {
            return (int) \mb_strlen($text);
        }

        return (int) $breakpoint;
    }
}
