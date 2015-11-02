<?php

namespace Coduo\PHPHumanizer\String;

/**
 * @deprecated since 1.0 use Coduo\PHPHumanizer\String\TextTruncate or Coduo\PHPHumanizer\String\HtmlTruncate instead
 */
class Truncate
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
     * @param string $text
     * @param int    $charactersCount
     * @param string $append
     */
    public function __construct($text, $charactersCount, $append = '')
    {
        $this->text = $text;
        $this->charactersCount = $charactersCount;
        $this->append = $append;
    }

    public function __toString()
    {
        if ($this->charactersCount < 0 || mb_strlen($this->text) <= ($this->charactersCount + mb_strlen($this->append))) {
            return $this->text;
        }

        $length = $this->charactersCount;
        if (false !== ($breakpoint = mb_strpos($this->text, ' ', $this->charactersCount))) {
            $length = $breakpoint;
        }

        return rtrim(mb_substr($this->text, 0, $length)).$this->append;
    }
}