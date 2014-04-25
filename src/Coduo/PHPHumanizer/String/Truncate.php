<?php

namespace Coduo\PHPHumanizer\String;

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
     * @param int $charactersCount
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
        if ($this->charactersCount < 0 || strlen($this->text) <= $this->charactersCount) {
            return $this->text;
        }

        $word = \IntlBreakIterator::createWordInstance(\Locale::getDefault());
        $word->setText($this->text);
        $word->following($this->charactersCount);

        return substr($this->text, 0, $word->current()) . $this->append;
    }
}
