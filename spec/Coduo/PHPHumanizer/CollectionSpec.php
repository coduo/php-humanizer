<?php

namespace spec\Coduo\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_humanizes_collections()
    {
        $examples = array(
            array(array("Michal"), null, 'Michal'),
            array(array("Michal", "Norbert"), null, 'Michal and Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'Michal, Norbert, and 1 other'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'Michal, Norbert, and 2 others'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'Michal, Norbert, Lukasz, and Pawel'),
        );

        foreach ($examples as $example) {
            $this->oxford($example[0], $example[1])->shouldReturn($example[2]);
        }
    }

    function it_humanizes_collections_for_polish_locale()
    {
        $examples = array(
            array(array("Michal"), null, 'Michal'),
            array(array("Michal", "Norbert"), null, 'Michal i Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'Michal, Norbert i 1 inny'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'Michal, Norbert i 2 innych'),
        );

        foreach ($examples as $example) {
            $this->oxford($example[0], $example[1], 'pl')->shouldReturn($example[2]);
        }
    }

    function it_humanizes_collections_for_dutch_locale()
    {
        $examples = array(
            array(array("Michal"), null, 'Michal'),
            array(array("Michal", "Norbert"), null, 'Michal en Norbert'),
            array(array("Michal", "Norbert", "Lukasz"), 2, 'Michal, Norbert, en 1 andere'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), 2, 'Michal, Norbert, en 2 andere'),
            array(array("Michal", "Norbert", "Lukasz", "Pawel"), null, 'Michal, Norbert, Lukasz, en Pawel'),
        );

        foreach ($examples as $example) {
            $this->oxford($example[0], $example[1], 'nl')->shouldReturn($example[2]);
        }
    }
}
