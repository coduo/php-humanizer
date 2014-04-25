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
        $this->shouldThrow(new \InvalidArgumentException("Binary suffix converter accept only numeric values."))
            ->during('binarySuffix', array('as12'));
    }

    function it_convert_number_to_string_with_metric_suffix()
    {
        $this->metricSuffix(-1)->shouldReturn("-1");
        $this->metricSuffix(0)->shouldReturn("0");
        $this->metricSuffix(1)->shouldReturn("1");
        $this->metricSuffix(101)->shouldReturn("101");
        $this->metricSuffix(1000)->shouldReturn("1k");
        $this->metricSuffix(1240)->shouldReturn("1.2k");
        $this->metricSuffix(1240000)->shouldReturn("1.24M");
        $this->metricSuffix(3500000)->shouldReturn("3.5M");
    }

    function it_convert_number_to_string_with_metric_suffix_for_specific_locale()
    {
        $this->metricSuffix(1240, 'pl')->shouldReturn("1,2k");
        $this->metricSuffix(1240000, 'pl')->shouldReturn("1,24M");
        $this->metricSuffix(3500000, 'pl')->shouldReturn("3,5M");
    }

    function it_throw_exception_when_converting_to_string_with_metric_suffix_non_numeric_values()
    {
        $this->shouldThrow(new \InvalidArgumentException("Metric suffix converter accept only numeric values."))
            ->during('metricSuffix', array('as12'));
    }

    function it_converts_numbers_to_roman()
    {
        $this->toRoman(1)->shouldReturn("I");
        $this->toRoman(5)->shouldReturn("V");
        $this->toRoman(9)->shouldReturn("IX");
        $this->toRoman(10)->shouldReturn("X");
        $this->toRoman(125)->shouldReturn("CXXV");
        $this->toRoman(1300)->shouldReturn("MCCC");
        $this->toRoman(3999)->shouldReturn("MMMCMXCIX");
    }

    function it_throws_exception_when_converting_number_is_out_of_range()
    {
        $this->shouldThrow(new \InvalidArgumentException())->during('toRoman', array(-1));
        $this->shouldThrow(new \InvalidArgumentException())->during('toRoman', array(4000));
    }

    function it_converts_roman_numbers_to_arabic()
    {
        $this->fromRoman("I")->shouldReturn(1);
        $this->fromRoman("V")->shouldReturn(5);
        $this->fromRoman("IX")->shouldReturn(9);
        $this->fromRoman("CXXV")->shouldReturn(125);
        $this->fromRoman("MCCC")->shouldReturn(1300);
        $this->fromRoman("MMMCMXCIX")->shouldReturn(3999);
    }

    function it_throws_exception_when_converting_roman_number_is_invalid()
    {
        $this->shouldThrow(new \InvalidArgumentException())->during('fromRoman', array(1234));
        $this->shouldThrow(new \InvalidArgumentException())->during('fromRoman', array(""));
        $this->shouldThrow(new \InvalidArgumentException())->during('fromRoman', array("foobar"));
    }
}
