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

    function it_returns_ordinal_suffix()
    {
        $this->ordinal(1)->shouldReturn("st");
        $this->ordinal(2)->shouldReturn("nd");
        $this->ordinal(23)->shouldReturn("rd");
        $this->ordinal(1002)->shouldReturn("nd");
        $this->ordinal(-111)->shouldReturn("th");
    }

    function it_convert_number_to_string_with_binary_suffix()
    {
        $this->binarySuffix(-1)->shouldReturn(-1);
        $this->binarySuffix(0)->shouldReturn("0 bytes");
        $this->binarySuffix(1)->shouldReturn("1 bytes");
        $this->binarySuffix(1024)->shouldReturn("1 kB");
        $this->binarySuffix(1025)->shouldReturn("1 kB");
        $this->binarySuffix(1536)->shouldReturn("1.5 kB");
        $this->binarySuffix(1048576 * 5)->shouldReturn("5 MB");
        $this->binarySuffix(1073741824 * 2)->shouldReturn("2 GB");
        $this->binarySuffix(1099511627776 * 3)->shouldReturn("3 TB");
        $this->binarySuffix(1325899906842624)->shouldReturn("1.18 PB");
    }

    function it_convert_number_to_string_with_binary_suffix_for_specific_locale()
    {
        $this->binarySuffix(1536, 'pl')->shouldReturn("1,5 kB");
        $this->binarySuffix(1325899906842624, 'pl')->shouldReturn("1,18 PB");
    }

    function it_throw_exception_when_converting_to_string_with_binary_suffix_non_numeric_values()
    {
        $this->shouldThrow(new \RuntimeException("binarySuffix converter accept only numeric values."))
            ->during('binarySuffix', array('as12'));
    }
}
