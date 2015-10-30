<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\TextTruncate;
use Coduo\PHPHumanizer\String\HtmlTruncate;
use Coduo\PHPHumanizer\String\WordBreakpoint;

class String
{
    public static function humanize($text, $capitalize = true)
    {
        return (string) new Humanize($text, $capitalize);
    }

    public static function truncate($text, $charactersCount, $append = '')
    {
        return (string) new TextTruncate($text, $charactersCount,new WordBreakpoint(), $append);;
    }

    public static function truncateHtml($text, $charactersCount, $allowedTags = '<b><i><u><em><strong><a><span>', $append = '')
    {
        return (string) new HtmlTruncate($text, $charactersCount,new WordBreakpoint(), $allowedTags, $append);;
    }
}
