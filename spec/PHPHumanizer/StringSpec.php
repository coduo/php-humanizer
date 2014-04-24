<?php

namespace spec\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringSpec extends ObjectBehavior
{
    function it_humanize_string()
    {
        $this->humanize('news_count')->shouldReturn('News count');
    }

    function it_humanize_strings_without_capitalize()
    {
        $this->humanize('user', false)->shouldReturn('user');
    }

    function it_humanize_string_excluding_forbidden_words()
    {
        $this->humanize('news_id')->shouldReturn('News');
    }
}
