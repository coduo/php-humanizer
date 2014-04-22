<?php

namespace PHPHumanizer;

class Number
{

    public static function ordinalize($number)
    {
        return $number . self::oridinal($number);
    }

    public static function oridinal($number)
    {
        $absNumber = abs((integer)$number);

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
