<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\Translator\Builder;

class DateTime
{
    public static function difference(\DateTime $fromDate, \DateTime $toDate, $locale = 'en')
    {
        $formatter = new Formatter(Builder::build($locale));
        return $formatter->formatDifference(new Difference($fromDate, $toDate), $locale);
    }
}
