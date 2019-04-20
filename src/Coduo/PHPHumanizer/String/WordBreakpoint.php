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
    /**
     * @param string $text
     * @param int $charactersCount
     * @return bool|int
     */
    public function calculatePosition($text, $charactersCount)
    {
        if ($charactersCount < 0) {
            return \mb_strlen($text);
        }

        if ($charactersCount > \mb_strlen($text)) {
            return \mb_strlen($text);
        }

        $breakpoint = \mb_strpos($text, ' ', $charactersCount);

        if (false === $breakpoint) {
            return \mb_strlen($text);
        }

        return $breakpoint;
    }
}
