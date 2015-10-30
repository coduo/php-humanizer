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
        $truncate = new TextTruncate($text, $charactersCount, $append);
        $truncate->setBreakpoint(new WordBreakpoint());
        return (string) $truncate;
    }

    public static function truncateHtml($text, $charactersCount, $allowedTags = '<b><i><u><em><strong><a><span>', $append = '')
    {
        $truncate = new HtmlTruncate($text, $charactersCount, $allowedTags, $append);
        $truncate->setBreakpoint(new WordBreakpoint());
        return (string) $truncate;
    }
}
