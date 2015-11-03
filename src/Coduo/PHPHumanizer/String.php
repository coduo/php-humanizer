<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\TextTruncate;
use Coduo\PHPHumanizer\String\HtmlTruncate;
use Coduo\PHPHumanizer\String\WordBreakpoint;

class String
{
    /**
     * @param $text
     * @param bool|true $capitalize
     * @param string $separator
     * @param array $forbiddenWords
     * 
     * @return string
     */
    public static function humanize($text, $capitalize = true, $separator = '_', array $forbiddenWords = array())
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
}
