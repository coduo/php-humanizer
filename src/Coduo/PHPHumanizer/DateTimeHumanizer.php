<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\PreciseDifference;
use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\DateTime\PreciseFormatter;
use Coduo\PHPHumanizer\Translator\Builder;

final class DateTimeHumanizer
{
    /**
     * @param \DateTime $fromDate
     * @param \DateTime $toDate
     * @param string $locale
     * @return string
     */
    public static function difference(\DateTime $fromDate, \DateTime $toDate, $locale = 'en')
    {
        $formatter = new Formatter(Builder::build($locale));

        return $formatter->formatDifference(new Difference($fromDate, $toDate), $locale);
    }

    /**
     * @param \DateTime $fromDate
     * @param \DateTime $toDate
     * @param string $locale
     * @return string
     */
    public static function preciseDifference(\DateTime $fromDate, \DateTime $toDate, $locale = 'en')
    {
        $formatter = new PreciseFormatter(Builder::build($locale));

        return $formatter->formatDifference(new PreciseDifference($fromDate, $toDate), $locale);
    }
}
