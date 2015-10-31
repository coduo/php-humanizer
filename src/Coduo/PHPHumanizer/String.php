<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\Truncate;

class String
{
    public static function humanize($text, $capitalize = true, $separator = Humanize::SEPARATOR_UNDERSCORE)
    {
        return (string) new Humanize($text, $capitalize, $separator);
    }

    public static function truncate($text, $charactersCount, $append = '')
    {
        return (string) new Truncate($text, $charactersCount, $append);
    }
}
