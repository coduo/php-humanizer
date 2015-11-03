<?php

namespace spec\Coduo\PHPHumanizer\String;

use Coduo\PHPHumanizer\String\WordBreakpoint;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordBreakpointSpec extends ObjectBehavior
{

    function it_calculate_breakpoint_position_when_sentence_is_longer_than_characters_count()
    {
        $this->calculatePosition('Lorem ipsum dolorem', 2)->shouldReturn(5);
        $this->calculatePosition('Lorem ipsum dolorem', 4)->shouldReturn(5);
        $this->calculatePosition('Lorem ipsum dolorem', 5)->shouldReturn(5);
        $this->calculatePosition('Lorem ipsum dolorem', 10)->shouldReturn(11);
        $this->calculatePosition('Lorem ipsum dolorem', -2)->shouldReturn(19);
        $this->calculatePosition('Lorem ipsum dolorem', 0)->shouldReturn(5);
    }
    
    function it_calculate_breakpoint_position_when_sentence_is_shorter_than_characters_count()
    {
         $this->calculatePosition('Lorem ipsum dolorem', 20)->shouldReturn(19);
    }
    
    function it_calculate_breakpoint_position_when_characters_count_ends_in_last_word()
    {
        $this->calculatePosition('Lorem ipsum', 7)->shouldReturn(11);
    }

    function it_calculate_breakpoint_position_when_characters_count_ends_in_last_space()
    {
        $this->calculatePosition('Lorem ipsum', 5)->shouldReturn(5);
    }
}
