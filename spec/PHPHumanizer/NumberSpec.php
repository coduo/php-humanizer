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
}
