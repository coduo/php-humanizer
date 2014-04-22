<?php

namespace PHPHumanizer;

use PHPHumanizer\String\Humanize;

class String
{
    public static function humanize($text, $capitalize = true)
    {
        return (string) new Humanize($text, $capitalize);
    }
}
