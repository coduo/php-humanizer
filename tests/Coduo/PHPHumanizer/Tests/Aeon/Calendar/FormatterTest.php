<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests\Aeon\Calendar;

use Aeon\Calendar\RelativeTimeUnit;
use Aeon\Calendar\TimeUnit;
use Coduo\PHPHumanizer\Aeon\Calendar\Formatter;
use Coduo\PHPHumanizer\Translator\Builder;
use PHPUnit\Framework\TestCase;

final class FormatterTest extends TestCase
{
    public function test_format_complex_time_unit() : void
    {
        $timeUnit = TimeUnit::days(2)
            ->add(TimeUnit::hours(3))
            ->add(TimeUnit::minutes(25))
            ->add(TimeUnit::seconds(30))
            ->add(TimeUnit::milliseconds(200));

        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            '2 days, 3 hours, 25 minutes, and 30.2 seconds',
            $formatter->timeUnit($timeUnit)
        );
    }

    public function test_format_relative_time_unit() : void
    {
        $timeUnit = RelativeTimeUnit::months(14);

        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            '1 year and 2 months',
            $formatter->timeUnit($timeUnit)
        );
    }

    public function test_format_time_units_smaller_than_1_sec() : void
    {
        $timeUnit = TimeUnit::milliseconds(200);

        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            '0.2 second',
            $formatter->timeUnit($timeUnit)
        );
    }
}
