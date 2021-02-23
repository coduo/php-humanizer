<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class TextTruncate implements TruncateInterface
{
    private string $append;

    private Breakpoint $breakpoint;

    public function __construct(Breakpoint $breakpoint, string $append = '')
    {
        $this->breakpoint = $breakpoint;
        $this->append = $append;
    }

    public function truncate(string $text, int $charactersCount) : string
    {
        if ($charactersCount < 0 || \mb_strlen($text) <= $charactersCount) {
            return $text;
        }

        $truncatedText = \rtrim(\mb_substr($text, 0, $this->breakpoint->calculatePosition($text, $charactersCount)));

        return ($truncatedText === $text) ? $truncatedText : $truncatedText . $this->append;
    }
}
