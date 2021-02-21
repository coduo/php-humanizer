<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\PreciseDifference;
use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\DateTime\PreciseFormatter;
use Coduo\PHPHumanizer\Translator\Builder;

final class DateTimeHumanizer
{
    public static function difference(\DateTime $fromDate, \DateTime $toDate, string $locale = 'en'): string
    {
        $formatter = new Formatter(Builder::build($locale));

        return $formatter->formatDifference(new Difference($fromDate, $toDate), $locale);
    }

    public static function preciseDifference(\DateTime $fromDate, \DateTime $toDate, string $locale = 'en'): string
    {
        $formatter = new PreciseFormatter(Builder::build($locale));

        return $formatter->formatDifference(new PreciseDifference($fromDate, $toDate), $locale);
    }
}
