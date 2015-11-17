<?php

namespace Coduo\PHPHumanizer\Number;

class Ordinal
{
    /**
     * @var int|float
     */
    private $number;

    /**
    *  @var string 
    */
    private $locale;
    /**
     * @param int|float $number
     */
    public function __construct($number, $locale = 'en')
    {
        $this->number = $number;
        $this->locale = $locale;
    }

    public function __toString()
    {
        $absNumber = abs((integer) $this->number);

        if ($this->locale == 'id'){
            return 'ke-';
        }

        if (in_array(($absNumber % 100), array(11, 12, 13))) {
            return 'th';
        }

        switch ($absNumber % 10) {
            case 1:  return 'st';
            case 2:  return 'nd';
            case 3:  return 'rd';
            default: return 'th';
        }
    }
}
