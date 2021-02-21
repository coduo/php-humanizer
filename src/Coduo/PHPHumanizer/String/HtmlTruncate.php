<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

final class HtmlTruncate implements TruncateInterface
{
    private string $append;

    private string $allowedTags;

    private Breakpoint $breakpoint;

    public function __construct(Breakpoint $breakpoint, string $allowedTags = '', string $append = '')
    {
        $this->breakpoint = $breakpoint;
        $this->append = $append;
        $this->allowedTags = $allowedTags;
    }

    public function truncate(string $text, int $charactersCount): string
    {
        $strippedText = \strip_tags($text, $this->allowedTags);

        return $this->truncateHtml($strippedText, $charactersCount);
    }

    /**
     * Truncates a string to the given length.  It will optionally preserve
     * HTML tags if $is_html is set to true.
     *
     * Adapted from FuelPHP Str::truncate (https://github.com/fuelphp/common/blob/master/src/Str.php)
     */
    private function truncateHtml(string $string, int $charactersCount): string
    {
        $limit = $charactersCount;
        $offset = 0;
        $tags = [];

        // Handle special characters.
        \preg_match_all('#&[a-z]+;#i', \strip_tags($string), $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach ($matches as $match) {
            if ($match[0][1] >= $limit) {
                break;
            }
            $limit += (\mb_strlen($match[0][0]) - 1);
        }

        // Handle all the html tags.
        \preg_match_all('#<[^>]+>([^<]*)#', $string, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach ($matches as $match) {
            if ($match[0][1] - $offset >= $limit) {
                break;
            }

            $tag = \mb_substr((string) \strtok($match[0][0], " \t\n\r\0\x0B>"), 1);
            if ($tag[0] != '/') {
                $tags[] = $tag;
            } elseif (\end($tags) == \mb_substr($tag, 1)) {
                \array_pop($tags);
            }

            $offset += $match[1][1] - $match[0][1];
        }

        $newString = \mb_substr($string, 0, $limit = \min(\mb_strlen($string), $this->breakpoint->calculatePosition($string, $limit + $offset)));
        $newString .= (\mb_strlen($string) > $limit ? $this->append : '');
        $newString .= (\count($tags = \array_reverse($tags)) ? '</'.\implode('></', $tags).'>' : '');

        return $newString;
    }
}
