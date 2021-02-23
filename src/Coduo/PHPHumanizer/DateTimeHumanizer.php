<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer;

use Aeon\Calendar\Gregorian\TimePeriod;
use Aeon\Calendar\Unit;
use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\DateTime\PreciseDifference;
use Coduo\PHPHumanizer\DateTime\PreciseFormatter;
use Coduo\PHPHumanizer\Translator\Builder;

final class DateTimeHumanizer
{
    public static function difference(\DateTimeInterface $fromDate, \DateTimeInterface $toDate, string $locale = 'en') : string
    {
        $formatter = new Formatter(Builder::build($locale));

        return $formatter->formatDifference(new Difference($fromDate, $toDate), $locale);
    }

    public static function preciseDifference(\DateTimeInterface $fromDate, \DateTimeInterface $toDate, string $locale = 'en') : string
    {
        $formatter = new PreciseFormatter(Builder::build($locale));

        return $formatter->formatDifference(new PreciseDifference($fromDate, $toDate), $locale);
    }

    public static function timeUnit(Unit $unit, string $locale = 'en') : string
    {
        $formatter = new Aeon\Calendar\Formatter(Builder::build($locale));

        return $formatter->timeUnit($unit, $locale);
    }

    public static function timePeriod(TimePeriod $timePeriod, string $locale = 'en') : string
    {
        $formatter = new Formatter(Builder::build($locale));

        return $formatter->formatDifference(new Difference($timePeriod->start()->toDateTimeImmutable(), $timePeriod->end()->toDateTimeImmutable()), $locale);
    }

    public static function timePeriodPrecise(TimePeriod $timePeriod, string $locale = 'en') : string
    {
        $formatter = new PreciseFormatter(Builder::build($locale));

        return $formatter->formatDifference(new PreciseDifference($timePeriod->start()->toDateTimeImmutable(), $timePeriod->end()->toDateTimeImmutable()), $locale);
    }
}
