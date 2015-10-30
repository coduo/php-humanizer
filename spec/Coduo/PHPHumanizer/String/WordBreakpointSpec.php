<?php

namespace spec\Coduo\PHPHumanizer\String;

use Coduo\PHPHumanizer\String\WordBreakpoint;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordBreakpointSpec extends ObjectBehavior
{

    function it_breakpoint()
    {
        $text = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';

        $this->calculatePosition($text, 2)->shouldReturn(5);
        $this->calculatePosition($text, 4)->shouldReturn(5);
        $this->calculatePosition($text, 5)->shouldReturn(5);
        $this->calculatePosition($text, 10)->shouldReturn(11);
        $this->calculatePosition($text, 20)->shouldReturn(22);
        $this->calculatePosition($text, -2)->shouldReturn(-2);
        $this->calculatePosition($text, 0)->shouldReturn(5);
    }

}
