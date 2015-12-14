<?php

namespace Coduo\PHPHumanizer\String;

interface TruncateInterface
{
    /**
     * @param string $text
     * @param int    $charactersCount
     *
     * @return string mixed
     */
    public function truncate($text, $charactersCount);
}
