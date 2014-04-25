<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\Truncate;

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
}
