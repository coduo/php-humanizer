<?php

namespace Coduo\PHPHumanizer\String;

class TextTruncate implements Truncate
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $charactersCount;

    /**
     * @var string
     */
    private $append;

    /**
     * @var Breakpoint
     */
    private $breakpoint;

    /**
     * @param string     $text
     * @param int        $charactersCount
     * @param Breakpoint $breakpoint
     * @param string     $append
     */
    public function __construct($text, $charactersCount, $breakpoint, $append = '')
    {
        $this->text            = $text;
        $this->charactersCount = $charactersCount;
        $this->append          = $append;
        $this->breakpoint      = $breakpoint;
    }

    /**
     * @return string
     */
    public function truncate()
    {
        if ($this->charactersCount < 0 || strlen($this->text) <= $this->charactersCount) {
            return $this->text;
        }

        $length = $this->getLength($this->text, $this->charactersCount);
        return rtrim(mb_substr($this->text, 0, $length)).$this->append;
    }

    public function __toString()
    {
        return $this->truncate();
    }

    /**
     * Return the length of the newly truncated string using the breakpoint
     *
     * @param string $text
     * @param int    $charCount
     *
     * @return int
     */
    private function getLength($text, $charCount)
    {
        $length = $this->charactersCount;
        if (!empty($this->breakpoint)) {
            $length = $this->breakpoint->calculatePosition($text, $charCount);
        }
        return $length;
    }
}
