<?php

namespace Coduo\PHPHumanizer\String;

class Humanize
{
    /**
     * @var array
     */
    private $forbiddenWords = array('id');

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
     */
    public function __construct($text, $capitalize = true, $separator = '_')
    {
        $this->text = $text;
        $this->capitalize = $capitalize;
        $this->separator = $separator;
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
