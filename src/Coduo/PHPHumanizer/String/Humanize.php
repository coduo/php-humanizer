<?php

namespace Coduo\PHPHumanizer\String;

class Humanize
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var boolean
     */
    private $capitalize;

    /**
     * @var string
     */
    private $separator;

    /**
     * @param $text
     * @param bool $capitalize
     * @param string $separator
     * @param array $forbiddenWords
     */
    public function __construct($text, $capitalize = true, $separator = '_', array $forbiddenWords = array('id'))
    {
        $this->text = $text;
        $this->capitalize = $capitalize;
        $this->separator = $separator;
        $this->forbiddenWords = $forbiddenWords;
    }

    /**
     * @internal param bool $capitalize
     * @return string
     */
    public function __toString()
    {
        $humanized = trim(strtolower(preg_replace(array('/([A-Z])/', "/[{$this->separator}\\s]+/"), array('_$1', ' '), $this->text)));
        $humanized = trim(str_replace($this->forbiddenWords, "", $humanized));
        
        return $this->capitalize ?  ucfirst($humanized) : $humanized;
    }
}
