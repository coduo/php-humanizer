<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Parser;

class Ordinal
{
    /**
     * @var int|float
     */
    private $number;

    /**
    *  @var string 
    */
    private $parser;
    /**
     * @param int|float $number
     */
    public function __construct($number, $locale = 'en')
    {
        $this->number = $number;
        $this->parser = Parser::parse($locale);
    }

    public function __toString()
    {
        // $this->parser contains array of xml elements
        is_regular = False;
        foreach $this->parser->irregular as $number
        {
            if (preg_match($number[pattern], $this->number)) {
                return $number->prefix.$this->number.$number->suffix;
            }
            else {
                is_regular = True;
            } 
        }
        if (is_regular === True) {
            return $this->parser->regular->prefix.$this->number.$this->parser->regular->suffix;
        }

    }
}
