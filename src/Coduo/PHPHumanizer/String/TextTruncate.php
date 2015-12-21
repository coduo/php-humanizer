<?php

namespace Coduo\PHPHumanizer\String;

final class TextTruncate implements TruncateInterface
{
    /**
     * @var string
     */
    private $append;

    /**
     * @var Breakpoint
     */
    private $breakpoint;

    /**
     * @param Breakpoint $breakpoint
     * @param string     $append
     */
    public function __construct(Breakpoint $breakpoint, $append = '')
    {
        $this->breakpoint = $breakpoint;
        $this->append = $append;
    }

    /**
     * @param string $text
     * @param int    $charactersCount
     *
     * @return string
     */
    public function truncate($text, $charactersCount)
    {
        if ($charactersCount < 0 || mb_strlen($text) <= $charactersCount) {
            return $text;
        }

        $truncatedText = rtrim(mb_substr($text, 0, $this->breakpoint->calculatePosition($text, $charactersCount)));

        return ($truncatedText === $text) ? $truncatedText : $truncatedText.$this->append;
    }
}
