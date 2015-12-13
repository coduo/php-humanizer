<?php

namespace spec\Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\PreciseDifference;
use Coduo\PHPHumanizer\DateTime\Difference\CompoundResult;
use Coduo\PHPHumanizer\DateTime\Unit\Day;
use Coduo\PHPHumanizer\DateTime\Unit\Hour;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Translation\Translator;

class PreciseFormatterSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator);
        $translator->transChoice(
            'compound.day',
            10,
            array('%count%' => 10),
            'difference',
            'en'
        )->willReturn('10 days');

        $translator->transChoice(
            'compound.hour',
            5,
            array('%count%' => 5),
            'difference',
            'en'
        )->willReturn('5 hours');

        $translator->trans(
            'compound.future',
            array('%value%' => '10 days, 5 hours'),
            'difference',
            'en'
        )->willReturn('10 days, 5 hours from now');

        $translator->transChoice(
            'compound.day',
            10,
            array('%count%' => 10),
            'difference',
            'ru'
        )->willReturn('10 дней');

        $translator->transChoice(
            'compound.hour',
            5,
            array('%count%' => 5),
            'difference',
            'ru'
        )->willReturn('5 часов');

        $translator->trans(
            'compound.future',
            array('%value%' => '10 дней, 5 часов'),
            'difference',
            'ru'
        )->willReturn('через 10 дней, 5 часов');
    }

    function it_format_compound_datetime_diff()
    {
        $diff = new PreciseDifference(
            new \DateTime("2015-01-01 00:00:00"),
            new \DateTime("2015-01-11 05:00:00")   
        );

        $this->formatDifference($diff)->shouldReturn('10 days, 5 hours from now');
    }

    function it_format_compound_datetime_diff_for_specific_locale()
    {
        $diff = new PreciseDifference(
            new \DateTime("2015-01-01 00:00:00"),
            new \DateTime("2015-01-11 05:00:00")
        );
        
        $this->formatDifference($diff, 'ru')->shouldReturn('через 10 дней, 5 часов');
    }
}
