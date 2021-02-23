<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\HtmlTruncate;
use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\ShortcodeProcessor;
use Coduo\PHPHumanizer\String\TextTruncate;
use Coduo\PHPHumanizer\String\WordBreakpoint;

final class StringHumanizer
{
    /**
     * @param array<string> $forbiddenWords
     */
    public static function humanize(string $text, bool $capitalize = true, string $separator = '_', array $forbiddenWords = []) : string
    {
        return (string) new Humanize($text, $capitalize, $separator, $forbiddenWords);
    }

    public static function truncate(string $text, int $charactersCount, string $append = '') : string
    {
        $truncate = new TextTruncate(new WordBreakpoint(), $append);

        return $truncate->truncate($text, $charactersCount);
    }

    public static function truncateHtml(string $text, int $charactersCount, string $allowedTags = '', string $append = '') : string
    {
        $truncate = new HtmlTruncate(new WordBreakpoint(), $allowedTags, $append);

        return $truncate->truncate($text, $charactersCount);
    }

    public static function removeShortcodes(string $text) : string
    {
        if (!\class_exists('\Thunder\Shortcode\Processor\Processor')) {
            throw new \RuntimeException('Please add "thunderer/shortcode": ^0.7 to composer.json first');
        }

        $processor = new ShortcodeProcessor();

        return $processor->removeShortcodes($text);
    }

    public static function removeShortcodeTags(string $text) : string
    {
        if (!\class_exists('\Thunder\Shortcode\Processor\Processor')) {
            throw new \RuntimeException('Please add "thunderer/shortcode": ^0.7 to composer.json first');
        }

        $processor = new ShortcodeProcessor();

        return $processor->removeShortcodeTags($text);
    }
}
