<?php

namespace spec\Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\Unit;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DifferenceSpec extends ObjectBehavior
{
    function it_calculate_diff_between_present_and_past_date_in_minutes()
    {
        $this->beConstructedWith(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:45:00"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Minute');
        $this->getQuantity()->shouldReturn(15);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_minutes()
    {
        $this->beConstructedWith(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:15:00"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Minute');
        $this->getQuantity()->shouldReturn(15);
        $this->isPast()->shouldReturn(false);
    }

    function it_calculate_diff_between_present_and_past_date_in_hours()
    {
        $this->beConstructedWith(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 11:00:00"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Hour');
        $this->getQuantity()->shouldReturn(2);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_hours()
    {
        $this->beConstructedWith(new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 16:00:00"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Hour');
        $this->getQuantity()->shouldReturn(3);
        $this->isPast()->shouldReturn(false);
    }

    function it_calculate_diff_between_present_and_past_date_in_days()
    {
        $this->beConstructedWith(new \DateTime("2014-04-10"), new \DateTime("2014-04-09"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Day');
        $this->getQuantity()->shouldReturn(1);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_days()
    {
        $this->beConstructedWith(new \DateTime("2014-04-10"), new \DateTime("2014-04-11"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Day');
        $this->getQuantity()->shouldReturn(1);
        $this->isPast()->shouldReturn(false);
    }

    function it_calculate_diff_between_present_and_past_date_in_weeks()
    {
        $this->beConstructedWith(new \DateTime("2014-04-15"), new \DateTime("2014-04-01"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Week');
        $this->getQuantity()->shouldReturn(2);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_weeks()
    {
        $this->beConstructedWith(new \DateTime("2014-04-01"), new \DateTime("2014-04-15"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Week');
        $this->getQuantity()->shouldReturn(2);
        $this->isPast()->shouldReturn(false);
    }

    function it_calculate_diff_between_present_and_past_date_in_months()
    {
        $this->beConstructedWith(new \DateTime("2014-04-01"), new \DateTime("2014-03-01"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Month');
        $this->getQuantity()->shouldReturn(1);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_months()
    {
        $this->beConstructedWith(new \DateTime("2014-04-01"), new \DateTime("2014-05-01"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Month');
        $this->getQuantity()->shouldReturn(1);
        $this->isPast()->shouldReturn(false);
    }

    function it_calculate_diff_between_present_and_past_date_in_years()
    {
        $this->beConstructedWith(new \DateTime("2014-01-01"), new \DateTime("2012-01-01"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Year');
        $this->getQuantity()->shouldReturn(2);
        $this->isPast()->shouldReturn(true);
    }

    function it_calculate_diff_between_present_and_future_date_in_years()
    {
        $this->beConstructedWith(new \DateTime("2014-01-01"), new \DateTime("2015-01-01"));
        $this->getUnit()->shouldReturnAnInstanceOf('Coduo\PHPHumanizer\DateTime\Unit\Year');
        $this->getQuantity()->shouldReturn(1);
        $this->isPast()->shouldReturn(false);
    }
}
