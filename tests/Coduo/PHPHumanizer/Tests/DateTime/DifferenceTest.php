<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests\DateTime;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\Unit\Day;
use Coduo\PHPHumanizer\DateTime\Unit\Hour;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use Coduo\PHPHumanizer\DateTime\Unit\Month;
use Coduo\PHPHumanizer\DateTime\Unit\Week;
use Coduo\PHPHumanizer\DateTime\Unit\Year;
use PHPUnit\Framework\TestCase;

final class DifferenceTest extends TestCase
{
    public function test_calculate_diff_between_present_and_past_date_in_minutes() : void
    {
        $diff = new Difference(new \DateTime('2014-04-26 13:00:00'), new \DateTime('2014-04-26 12:45:00'));
        $this->assertInstanceOf(Minute::class, $diff->getUnit());
        $this->assertSame(15, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_minutes() : void
    {
        $diff = new Difference(new \DateTime('2014-04-26 13:00:00'), new \DateTime('2014-04-26 13:15:00'));
        $this->assertInstanceOf(Minute::class, $diff->getUnit());
        $this->assertSame(15, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_past_date_in_hours() : void
    {
        $diff = new Difference(new \DateTime('2014-04-26 13:00:00'), new \DateTime('2014-04-26 11:00:00'));
        $this->assertInstanceOf(Hour::class, $diff->getUnit());
        $this->assertSame(2, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_hours() : void
    {
        $diff = new Difference(new \DateTime('2014-04-26 13:00:00'), new \DateTime('2014-04-26 16:00:00'));
        $this->assertInstanceOf(Hour::class, $diff->getUnit());
        $this->assertSame(3, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_past_date_in_days() : void
    {
        $diff = new Difference(new \DateTime('2014-04-10'), new \DateTime('2014-04-09'));
        $this->assertInstanceOf(Day::class, $diff->getUnit());
        $this->assertSame(1, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_days() : void
    {
        $diff = new Difference(new \DateTime('2014-04-10'), new \DateTime('2014-04-11'));
        $this->assertInstanceOf(Day::class, $diff->getUnit());
        $this->assertSame(1, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_past_date_in_weeks() : void
    {
        $diff = new Difference(new \DateTime('2014-04-15'), new \DateTime('2014-04-01'));
        $this->assertInstanceOf(Week::class, $diff->getUnit());
        $this->assertSame(2, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_weeks() : void
    {
        $diff = new Difference(new \DateTime('2014-04-01'), new \DateTime('2014-04-15'));
        $this->assertInstanceOf(Week::class, $diff->getUnit());
        $this->assertSame(2, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_past_date_in_months() : void
    {
        $diff = new Difference(new \DateTime('2014-04-01'), new \DateTime('2014-03-01'));
        $this->assertInstanceOf(Month::class, $diff->getUnit());
        $this->assertSame(1, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_months() : void
    {
        $diff = new Difference(new \DateTime('2014-04-01'), new \DateTime('2014-05-01'));
        $this->assertInstanceOf(Month::class, $diff->getUnit());
        $this->assertSame(1, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_past_date_in_years() : void
    {
        $diff = new Difference(new \DateTime('2014-01-01'), new \DateTime('2012-01-01'));
        $this->assertInstanceOf(Year::class, $diff->getUnit());
        $this->assertSame(2, $diff->getQuantity());
        $this->assertTrue($diff->isPast());
    }

    public function test_calculate_diff_between_present_and_future_date_in_years() : void
    {
        $diff = new Difference(new \DateTime('2014-01-01'), new \DateTime('2015-01-01'));
        $this->assertInstanceOf(Year::class, $diff->getUnit());
        $this->assertSame(1, $diff->getQuantity());
        $this->assertFalse($diff->isPast());
    }
}
