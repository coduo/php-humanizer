<?php

namespace Coduo\PHPHumanizer\String;

interface Breakpoint
{
    /**
     * Return the length of the truncated $text depending on the $characterCount.
     *
     * @param string $text
     * @param int    $charactersCount
     * @param int    $charactersCount
     *
     * @return int
     */
    public function calculatePosition($text, $charactersCount);
}
