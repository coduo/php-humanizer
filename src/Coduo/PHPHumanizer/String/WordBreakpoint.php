<?php

namespace Coduo\PHPHumanizer\String;

class WordBreakpoint implements Breakpoint
{
    public function calculatePosition($text, $charactersCount)
    {
        $length = $charactersCount;
        if ($charactersCount >= 0 && false !== ($breakpoint = mb_strpos($text, ' ', $charactersCount))) {
            $length = $breakpoint;
        }
        return $length;
    }
}
