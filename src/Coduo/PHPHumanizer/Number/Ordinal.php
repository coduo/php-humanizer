<?php

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

class Ordinal
{
    /**
     * @var int
     */
    private $number;

    /**
    *  @var string
    */
    private $locale;

    /**
     * @param int $number
     * @param string $locale
     */
    public function __construct($number, $locale = 'en')
    {
        $this->number = $number;
        $this->locale = $locale;
    }
    
    private function build()
    {
    	if (!preg_match('/^([a-z]{2})(_([A-Z]{2}))?$/', $this->locale, $m)) {
    		throw new \RuntimeException("Invalid locale specified: .'$this->locale'.");
    	}
    	$strategy = $m[1];
    	if (!empty($m[3])) {
    		$strategy .= "_$m[3]";
    	}
    	$strategy .= ".xml";
    
    	return $strategy;
    }

    public function ordinalize()
    {
        if ($this->number < 0){
            throw new \RuntimeException("Cannot treat negative number as ordinal");
        }

        if (is_float($this->number)){
            throw new \RuntimeException("Cannot treat float number as ordinal");
        }

        $xml = simplexml_load_file(__DIR__.'/Ordinal/'.$this->build());

		foreach ($xml->irregular->children() as $numbers) {
			if (preg_match($numbers['pattern'], $this->number)){
				return $numbers->prefix. $this->number. $numbers->suffix;
			}
		}
		return $xml->regular->prefix. $this->number. $xml->regular->suffix;
    }
}
