<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\ShortcodeProcessor;
use Coduo\PHPHumanizer\String\TextTruncate;
use Coduo\PHPHumanizer\String\HtmlTruncate;
use Coduo\PHPHumanizer\String\WordBreakpoint;

final class StringHumanizer
{
    /**
     * @param $text
     * @param bool|true $capitalize
     * @param string    $separator
     * @param array     $forbiddenWords
     *
     * @return string
     */
    public static function humanize($text, $capitalize = true, $separator = '_', array $forbiddenWords = [])
    {
        return (string) new Humanize($text, $capitalize, $separator, $forbiddenWords);
    }

    /**
     * @param $text
     * @param $charactersCount
     * @param string $append
     *
     * @return string
     */
    public static function truncate($text, $charactersCount, $append = '')
    {
        $truncate = new TextTruncate(new WordBreakpoint(), $append);

        return $truncate->truncate($text, $charactersCount);
    }

    /**
     * @param $text
     * @param $charactersCount
     * @param string $allowedTags
     * @param string $append
     *
     * @return string
     */
    public static function truncateHtml($text, $charactersCount, $allowedTags = '', $append = '')
    {
        $truncate = new HtmlTruncate(new WordBreakpoint(), $allowedTags, $append);

        return $truncate->truncate($text, $charactersCount);
    }

    /**
     * @param $text
     * @return string
     */
    public static function removeShortcodes($text)
    {
        if (!\class_exists('Thunder\Shortcode\Processor\Processor')) {
            throw new \RuntimeException('Please add "thunderer/shortcode": ^0.7 to composer.json first');
        }

        $processor = new ShortcodeProcessor();

        return $processor->removeShortcodes($text);
    }

    /**
     * @param $text
     * @return string
     */
    public static function removeShortcodeTags($text)
    {
        if (!\class_exists('Thunder\Shortcode\Processor\Processor')) {
            throw new \RuntimeException('Please add "thunderer/shortcode": ^0.7 to composer.json first');
        }

        $processor = new ShortcodeProcessor();

        return $processor->removeShortcodeTags($text);
    }
}
