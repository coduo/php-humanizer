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
     * @param string $text
     * @param int    $charactersCount
     * @param string $append
     */
    public function __construct($text, $charactersCount, $append = '')
    {
        $this->text            = $text;
        $this->charactersCount = $charactersCount;
        $this->append          = $append;
    }

    /**
     * @param Breakpoint $breakpoint
     * @return TextTruncate
     */
    public function setBreakpoint($breakpoint) {
        $this->breakpoint = $breakpoint;
        return $this;
    }

    /**
     * Return the length of the newly truncated string using the breakpoint
     *
     * @param string $text
     * @param int    $charCount
     *
     * @return int
     */
    protected function getLength($text, $charCount)
    {
        $length = $this->charactersCount;
        if (!empty($this->breakpoint)) {
            $length = $this->breakpoint->len($text, $charCount);
        }
        return $length;
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
}
