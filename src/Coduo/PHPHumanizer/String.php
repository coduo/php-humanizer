<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\String\Humanize;
use Coduo\PHPHumanizer\String\Truncate;

class String
{
    /**
     * @param $text
     * @param bool|true $capitalize
     * @param string $separator
     * @param array $forbiddenWords
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
     * @return string
     */
    public static function truncate($text, $charactersCount, $append = '')
    {
        return (string) new Truncate($text, $charactersCount, $append);
    }
}
