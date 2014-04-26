<?php

namespace spec\Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Translation\Translator;

class FormatterSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator);
        $translator->transChoice(
            'minute.past',
            10,
            array('%count%' => 10),
            'difference',
            'en'
        )->willReturn('10 minutes ago');

        $translator->transChoice(
            'minute.past',
            10,
            array('%count%' => 10),
            'difference',
            'pl'
        )->willReturn('10 minut temu');
    }

    function it_format_datetime_diff(Difference $diff)
    {
        $diff->getUnit()->willReturn(new Minute());
        $diff->getQuantity()->willReturn(10);
        $diff->isPast()->willReturn(true);
        $this->formatDifference($diff)->shouldReturn('10 minutes ago');
    }

    function it_format_datetime_diff_for_specific_locale(Difference $diff)
    {
        $diff->getUnit()->willReturn(new Minute());
        $diff->getQuantity()->willReturn(10);
        $diff->isPast()->willReturn(true);
        $this->formatDifference($diff, 'pl')->shouldReturn('10 minut temu');
    }
}
