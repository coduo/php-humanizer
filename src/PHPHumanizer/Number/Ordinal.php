<?php

namespace PHPHumanizer\Number;

class Ordinal
{
    /**
     * @var int|double
     */
    private $number;

    /**
     * @param int|double $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        $absNumber = abs((integer) $this->number);

        if (in_array(($absNumber % 100), array(11,12,13))) {
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
