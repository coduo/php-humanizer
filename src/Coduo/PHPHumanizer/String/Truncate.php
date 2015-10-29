<?php

namespace Coduo\PHPHumanizer\String;

class Truncate
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @var int
     */
    protected $charactersCount;

    /**
     * @var string
     */
    protected $append;

    /**
     * @param string $text
     * @param int $charactersCount
     * @param string $append
     */
    public function __construct($text, $charactersCount, $append = '')
    {
        $this->text = $text;
        $this->charactersCount = $charactersCount;
        $this->append = $append;
    }

    protected function breakpoint($text, $charCount)
    {
        $length = $charCount;
        if (false !== ($breakpoint = mb_strpos($text, ' ', $charCount))) {
            $length = $breakpoint;
        }
        return $length;
    }

    public function __toString()
    {
        if ($this->charactersCount < 0 || strlen($this->text) <= $this->charactersCount) {
            return $this->text;
        }

        $length = $this->breakpoint($this->text, $this->charactersCount);
        return rtrim(mb_substr($this->text, 0, $length)) . $this->append;
    }
}
