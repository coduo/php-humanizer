<?php

namespace spec\Coduo\PHPHumanizer\Collection;
;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Translation\Translator;

class FormatterSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator);
        $translator->trans(
            'only_two',
            array('%first%' => 'Michal', '%second%' => 'Norbert'),
            'oxford'
        )->willReturn('Michal and Norbert');

        $translator->transChoice(
            'comma_separated_with_limit',
            1,
            array('%count%' => 1, "%list%" => 'Michal, Norbert'),
            'oxford'
        )->willReturn('Michal, Norbert and 1 more');

        $translator->trans(
            'comma_separated',
            array("%list%" => 'Michal, Norbert', '%last%' => "Lukasz"),
            'oxford'
        )->willReturn('Michal, Norbert and Lukasz');
    }

    function it_formats_two_elements()
    {
        $this->format(array("Michal", "Norbert"), null)->shouldReturn("Michal and Norbert");
    }

    function it_formats_elements_with_limit()
    {
        $this->format(array("Michal", "Norbert", "Lukasz"), 2)->shouldReturn("Michal, Norbert and 1 more");
    }

    function it_formats_elements_without_limit()
    {
        $this->format(array("Michal", "Norbert", "Lukasz"), null)->shouldReturn("Michal, Norbert and Lukasz");
    }
}
