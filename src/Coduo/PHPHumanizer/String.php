<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\Truncate;
use Coduo\PHPHumanizer\String\TruncateHtml;

class String
{
    public static function humanize($text, $capitalize = true)
    {
        return (string) new Humanize($text, $capitalize);
    }

    public static function truncate($text, $charactersCount, $append = '')
    {
        return (string) new Truncate($text, $charactersCount, $append);
    }

    public static function truncateHtml($text, $charactersCount, $allowedTags = '<b><i><u><em><strong><a><span>', $append = '')
    {
        return (string) new TruncateHtml($text, $charactersCount, $allowedTags, $append);
    }
}
