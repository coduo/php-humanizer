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
     * @var bool
     */
    private $capitalize;

    /**
     * @param $text
     * @param bool $capitalize
     */
    public function __construct($text, $capitalize = true)
    {
        $this->text = $text;
        $this->capitalize = $capitalize;
    }

    /**
     * @internal param bool $capitalize
     *
     * @return string
     */
    public function __toString()
    {
        $humanized = trim(strtolower(preg_replace(array('/([A-Z])/', '/[_\s]+/'), array('_$1', ' '), $this->text)));
        $humanized = trim(str_replace($this->forbiddenWords, '', $humanized));

        return $this->capitalize ?  ucfirst($humanized) : $humanized;
    }
}
