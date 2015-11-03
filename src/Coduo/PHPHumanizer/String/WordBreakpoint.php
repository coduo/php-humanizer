<?php

namespace Coduo\PHPHumanizer\String;

class WordBreakpoint implements Breakpoint
{
    public function calculatePosition($text, $charactersCount)
    {
        if ($charactersCount < 0) {
            return mb_strlen($text);
        }
        
        if ($charactersCount > mb_strlen($text)) {
            return mb_strlen($text);
        }

        $breakpoint = mb_strpos($text, ' ', $charactersCount);
        
        if (false === $breakpoint) {
            return mb_strlen($text);
        }
        
        return $breakpoint;
    }
}
