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
     * @return string
     */
    public static function humanize($text, $capitalize = true)
    {
        return (string) new Humanize($text, $capitalize);
    }

    /**
     * @param $text
     * @param $charactersCount
     * @param string $append
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
     * @return string
     */
    public static function truncateHtml($text, $charactersCount, $allowedTags = '<b><i><u><em><strong><a><span>', $append = '')
    {
        $truncate = new HtmlTruncate(new WordBreakpoint(), $allowedTags, $append);
        
        return $truncate->truncate($text, $charactersCount);
    }
}
