<?php

/**
 * Ordinal number translator function for the English language.
 *
 * @param int|float $number
 * @return string ordinal
 */
return function ($number) {
    $absNumber = abs((integer) $number);

    if (in_array(($absNumber % 100), array(11, 12, 13))) {
        return 'th';
    }

    switch ($absNumber % 10) {
    case 1:  return 'st';
    case 2:  return 'nd';
    case 3:  return 'rd';
    default: return 'th';
    }
};
