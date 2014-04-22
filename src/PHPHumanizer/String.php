<?php

namespace PHPHumanizer;

class String
{
    protected static $forbiddenWords = array('id');

    public static function humanize($text, $capitalize = true)
    {
        $humanized = trim(strtolower(preg_replace(array('/([A-Z])/', '/[_\s]+/'), array('_$1', ' '), $text)));
        $humanized = trim(str_replace(self::$forbiddenWords, "", $humanized));
        return $capitalize ?  ucfirst($humanized) : $humanized;
    }
}
