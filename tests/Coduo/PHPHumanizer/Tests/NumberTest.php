<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\Number;

class NumberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider ordinalSuffixProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix($expected, $number)
    {
        $this->assertEquals($expected, Number::ordinal($number));
    }

    /**
     * @dataProvider ordinalizeDataProvider
     * @depends test_return_ordinal_suffix
     *
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers($expected, $number)
    {
        $this->assertEquals($expected, Number::ordinalize($number));
    }

    /**
     * @dataProvider binarySuffixDataProvider
     *
     * @param        $expected
     * @param        $number
     * @param string $locale
     */
    public function test_convert_number_to_string_with_binary_suffix($expected, $number, $locale = 'en')
    {
        $this->assertEquals($expected, Number::binarySuffix($number, $locale));
    }

    /**
     * @dataProvider binarySuffixWithPrecisionDataProvider
     *
     * @param         $expected
     * @param         $number
     * @param string  $locale
     * @param integer $precision
     */
    public function test_convert_number_to_string_with_binary_suffix_precision($expected, $number, $locale = 'en', $precision)
    {
        $this->assertEquals($expected, Number::binarySuffix($number, $locale, $precision));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_binary_suffix_non_numeric_values()
    {
        Number::binarySuffix('as12');
    }

    /**
     * @dataProvider metricSuffixDataProvider
     *
     * @param        $expected
     * @param        $number
     * @param string $locale
     */
    public function test_convert_number_to_string_with_metric_suffix($expected, $number, $locale = 'en')
    {
        $this->assertEquals($expected, Number::metricSuffix($number, $locale));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_metric_suffix_non_numeric_values()
    {
        Number::metricSuffix('as12');
    }

    /**
     * @dataProvider romanDataProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_converts_numbers_to_roman($expected, $number)
    {
        $this->assertEquals($expected, Number::toRoman($number));
    }

    /**
     * @dataProvider romanDataProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_convert_roman_numbers_to_arabic($number, $expected)
    {
        $this->assertEquals($expected, Number::fromRoman($number));
    }

    /**
     * @dataProvider romanExceptionProvider
     * @expectedException \InvalidArgumentException
     *
     * @param $number
     */
    public function test_statically_throw_exception_when_converting_number_is_out_of_range($number)
    {
        Number::toRoman($number);
    }

    /**
     * @dataProvider arabicExceptionProvider
     * @expectedException \InvalidArgumentException
     *
     * @param $number
     */
    public function test_statically_throw_exception_when_converting_roman_number_is_invalid($number)
    {
        Number::fromRoman($number);
    }

    /**
     * @return array
     */
    public function ordinalizeDataProvider()
    {
        return array(
            array('1st', 1),
            array('2nd', 2),
            array('23rd', 23),
            array('1002nd', 1002),
            array('-111th', -111),
        );
    }

    /**
     * @return array
     */
    public function ordinalSuffixProvider()
    {
        return array(
            array('st', 1),
            array('nd', 2),
            array('rd', 23),
            array('nd', 1002),
            array('th', -111),
        );
    }

    /**
     * @return array
     */
    public function binarySuffixDataProvider()
    {
        return array(
            array(-1, -1),
            array("0 bytes", 0),
            array("1 bytes", 1),
            array("1 kB", 1024),
            array("1 kB", 1025),
            array("1.5 kB", 1536),
            array("5 MB", 1048576 * 5),
            array("2 GB", 1073741824 * 2),
            array("3 TB", 1099511627776 * 3),
            array("1.18 PB", 1325899906842624),

            array("1,5 kB", 1536, 'pl'),
            array("1,18 PB", 1325899906842624, 'pl'),
        );
    }

    /**
     * @return array
     */
    public function binarySuffixWithPrecisionDataProvider()
    {
        return array(
            array(-1, -1, 'en', 3),
            array("0 bytes", 0, 'en', 3),
            array("1 bytes", 1, 'en', 3),
            array("1.000 kB", 1024, 'en', 3),
            array("1.001 kB", 1025, 'en', 3),
            array("1.500 kB", 1536, 'en', 3),
            array("5.000 MB", 1048576 * 5, 'en', 3),
            array("2.000 GB", 1073741824 * 2, 'en', 3),
            array("3.000 TB", 1099511627776 * 3, 'en', 3),
            array("1.178 PB", 1325899906842624, 'en', 3),

            array("1,500 kB", 1536, 'pl', 3),
            array("1,178 PB", 1325899906842624, 'pl', 3),
        );
    }

    /**
     * @return array
     */
    public function metricSuffixDataProvider()
    {
        return array(
            array("-1", -1),
            array("0", 0),
            array("1", 1),
            array("101", 101),
            array("1k", 1000),
            array("1.2k", 1240),
            array("1.24M", 1240000),
            array("3.5M", 3500000),

            array("1,2k", 1240, 'pl'),
            array("1,24M", 1240000, 'pl'),
            array("3,5M", 3500000, 'pl'),
        );
    }

    /**
     * @return array
     */
    public function romanDataProvider()
    {
        return array(
            array("I", 1),
            array("V", 5),
            array("IX", 9),
            array("X", 10),
            array("CXXV", 125),
            array("MCCC", 1300),
            array("MMMCMXCIX", 3999),
        );
    }

    /**
     * @return array
     */
    public function romanExceptionProvider()
    {
        return array(
            array(-1),
            array(4000),
        );
    }

    /**
     * @return array
     */
    public function arabicExceptionProvider()
    {
        return array(
            array(1234),
            array(""),
            array("foobar"),
        );
    }
}