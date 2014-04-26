<?php

namespace spec\Coduo\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeSpec extends ObjectBehavior
{
    function it_humanize_difference_between_dates()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'just now'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", '5 seconds from now'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", '1 minute ago'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minutes ago'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", '15 minutes from now'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", '1 hour from now'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", '2 hours from now'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", '1 hour ago'),
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]))->shouldReturn($example[2]);
        }
    }
    function it_humanize_difference_between_dates_for_pl_locale()
    {
        $examples = array(
            array("2014-04-26 13:00:00", "2014-04-26 13:00:00", 'w tym momencie'),
            array("2014-04-26 13:00:00", "2014-04-26 13:00:05", 'za 5 sekund'),
            array("2014-04-26 13:00:00", "2014-04-26 12:59:00", 'minutę temu'),
            array("2014-04-26 13:00:00", "2014-04-26 12:45:00", '15 minut temu'),
            array("2014-04-26 13:00:00", "2014-04-26 13:15:00", 'za 15 minut'),
            array("2014-04-26 13:00:00", "2014-04-26 14:00:00", 'za godzinę'),
            array("2014-04-26 13:00:00", "2014-04-26 15:00:00", 'za 2 godziny'),
            array("2014-04-26 13:00:00", "2014-04-26 12:00:00", 'godzinę temu'),
        );

        foreach ($examples as $example) {
            $this->difference(new \DateTime($example[0]), new \DateTime($example[1]), 'pl')->shouldReturn($example[2]);
        }
    }
}
