<?php

namespace spec\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumberSpec extends ObjectBehavior
{
    function it_ordinalizes_numbers()
    {
        $this->ordinalize(1)->shouldReturn("1st");
        $this->ordinalize(2)->shouldReturn("2nd");
        $this->ordinalize(23)->shouldReturn("23rd");
        $this->ordinalize(1002)->shouldReturn("1002nd");
        $this->ordinalize(-111)->shouldReturn("-111th");
    }

    function it_returns_oridinal_suffix()
    {
        $this->oridinal(1)->shouldReturn("st");
        $this->oridinal(2)->shouldReturn("nd");
        $this->oridinal(23)->shouldReturn("rd");
        $this->oridinal(1002)->shouldReturn("nd");
        $this->oridinal(-111)->shouldReturn("th");
    }

}
