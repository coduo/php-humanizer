<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests\DateTime;

use Coduo\PHPHumanizer\DateTime\PreciseDifference;
use Coduo\PHPHumanizer\DateTime\PreciseFormatter;
use Coduo\PHPHumanizer\Translator\Builder;
use PHPUnit\Framework\TestCase;

final class PreciseFormatterTest extends TestCase
{
    public function test_format_compound_datetime_diff()
    {
        $diff = new PreciseDifference(
            new \DateTime('2015-01-01 00:00:00'),
            new \DateTime('2015-01-11 05:00:00')
        );

        $formatter = new PreciseFormatter(Builder::build('en'));

        $this->assertSame('10 days, 5 hours from now', $formatter->formatDifference($diff));
    }

    public function test_format_compound_datetime_diff_for_specific_locale()
    {
        $diff = new PreciseDifference(
            new \DateTime('2015-01-01 00:00:00'),
            new \DateTime('2015-01-11 05:00:00')
        );

        $formatter = new PreciseFormatter(Builder::build('en'));

        $this->assertSame('через 10 дней, 5 часов', $formatter->formatDifference($diff, 'ru'));
    }

    public function test_format_date_interval() : void
    {
        $interval = new \DateInterval('P1DT5H25M43S');

        $formatter = new PreciseFormatter(Builder::build('en'));

        $this->assertSame(
            '1 day, 5 hours, 25 minutes, and 43 seconds',
            $formatter->formatInterval($interval)
        );
    }
}
