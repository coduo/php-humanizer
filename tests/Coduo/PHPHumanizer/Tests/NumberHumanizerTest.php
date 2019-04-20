<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\NumberHumanizer;

class NumberHumanizerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider ordinalIndicatorProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number));
    }

    /**
     * @dataProvider ordinalIndicatorDutchProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_dutch($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'nl'));
    }

    /**
     * @dataProvider ordinalIndicatorIndonesianProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_indonesian($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'id'));
    }

    /**
     * @dataProvider ordinalSuffixPtEsItProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_spanish($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'es'));
    }

    /**
     * @dataProvider ordinalSuffixPtEsItProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_italian($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'it'));
    }

    /**
     * @dataProvider ordinalSuffixGermanProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_german($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'de'));
    }

    /**
     * @dataProvider ordinalSuffixFrenchProvider
     * @param $expected
     * @param $number
     */
    public function test_return_ordinal_suffix_french($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinal($number, 'fr'));
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
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number));
    }

    /**
     * @dataProvider ordinalizeDataDutchProvider
     * @depends test_return_ordinal_suffix_dutch
     *
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_dutch($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'nl'));
    }

    /**
     * @dataProvider ordinalizeDataIndonesianProvider
     * @depends test_return_ordinal_suffix_indonesian
     *
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_indonesian($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'id'));
    }

    /**
     * @dataProvider ordinalizeDataPtEsItProvider
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_portuguese($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'pt'));
    }

    /**
     * @dataProvider ordinalizeDataPtEsItProvider
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_spanish($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'es'));
    }

    /**
     * @dataProvider ordinalizeDataPtEsItProvider
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_italian($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'it'));
    }

    /**
     * @dataProvider ordinalizeDataGermanProvider
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_german($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'de'));
    }

    /**
     * @dataProvider ordinalizeDataFrenchProvider
     * @param $expected
     * @param $number
     */
    public function test_ordinalize_numbers_french($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::ordinalize($number, 'fr'));
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
        $this->assertEquals($expected, NumberHumanizer::binarySuffix($number, $locale));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_binary_suffix_non_numeric_values()
    {
        NumberHumanizer::binarySuffix('as12');
    }

    /**
     * @dataProvider preciseBinarySuffixDataProvider
     *
     * @param         $expected
     * @param         $number
     * @param string  $locale
     * @param integer $precision
     */
    public function test_convert_number_to_string_with_precise_binary_suffix($expected, $number, $precision, $locale = 'en')
    {
        $this->assertEquals($expected, NumberHumanizer::preciseBinarySuffix($number, $precision, $locale));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_precise_binary_suffix_negative_precision()
    {
        NumberHumanizer::preciseBinarySuffix(1, -1);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_precise_binary_suffix_large_precision()
    {
        NumberHumanizer::preciseBinarySuffix(1, 4);
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
        $this->assertEquals($expected, NumberHumanizer::metricSuffix($number, $locale));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_statically_throw_exception_when_converting_to_string_with_metric_suffix_non_numeric_values()
    {
        NumberHumanizer::metricSuffix('as12');
    }

    /**
     * @dataProvider romanDataProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_converts_numbers_to_roman($expected, $number)
    {
        $this->assertEquals($expected, NumberHumanizer::toRoman($number));
    }

    /**
     * @dataProvider romanDataProvider
     *
     * @param $expected
     * @param $number
     */
    public function test_convert_roman_numbers_to_arabic($number, $expected)
    {
        $this->assertEquals($expected, NumberHumanizer::fromRoman($number));
    }

    /**
     * @dataProvider romanExceptionProvider
     * @expectedException \InvalidArgumentException
     *
     * @param $number
     */
    public function test_statically_throw_exception_when_converting_number_is_out_of_range($number)
    {
        NumberHumanizer::toRoman($number);
    }

    /**
     * @dataProvider arabicExceptionProvider
     * @expectedException \InvalidArgumentException
     *
     * @param $number
     */
    public function test_statically_throw_exception_when_converting_roman_number_is_invalid($number)
    {
        NumberHumanizer::fromRoman($number);
    }

    /**
     * @return array
     */
    public function ordinalIndicatorProvider()
    {
        return [
            ['st', 1],
            ['nd', 2],
            ['rd', 23],
            ['nd', 1002],
            ['th', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalIndicatorDutchProvider()
    {
        return [
            ['e', 1],
            ['e', 2],
            ['e', 23],
            ['e', 1002],
            ['e', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalIndicatorIndonesianProvider()
    {
        return [
            ['ke-', 1],
            ['ke-', 2],
            ['ke-', 23],
            ['ke-', 1002],
            ['ke-', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataProvider()
    {
        return [
            ['1st', 1],
            ['2nd', 2],
            ['23rd', 23],
            ['1002nd', 1002],
            ['-111th', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataDutchProvider()
    {
        return [
            ['1e', 1],
            ['2e', 2],
            ['23e', 23],
            ['1002e', 1002],
            ['-111e', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataIndonesianProvider()
    {
        return [
            ['ke-1', 1],
            ['ke-2', 2],
            ['ke-23', 23],
            ['ke-1002', 1002],
            ['ke--111', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataPtEsItProvider()
    {
        return [
            ['1o', 1],
            ['2o', 2],
            ['23o', 23],
            ['1002o', 1002],
            ['-111o', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataGermanProvider()
    {
        return [
            ['1.', 1],
            ['2.', 2],
            ['23.', 23],
            ['1002.', 1002],
            ['-111.', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalizeDataFrenchProvider()
    {
        return [
            ['1er', 1],
            ['2e', 2],
            ['23e', 23],
            ['1002e', 1002],
            ['-111e', -111],
        ];
    }
    /**
     * @return array
     */
    public function ordinalSuffixPtEsItProvider()
    {
        return [
            ['o', 1],
            ['o', 2],
            ['o', 23],
            ['o', 1002],
            ['o', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalSuffixGermanProvider()
    {
        return [
            ['.', 1],
            ['.', 2],
            ['.', 23],
            ['.', 1002],
            ['.', -111],
        ];
    }

    /**
     * @return array
     */
    public function ordinalSuffixFrenchProvider()
    {
        return [
            ['er', 1],
            ['e', 2],
            ['e', 23],
            ['e', 1002],
            ['e', -111],
        ];
    }

    /**
     * @return array
     */
    public function binarySuffixDataProvider()
    {
        return [
            [-1, -1],
            ['0 bytes', 0],
            ['1 bytes', 1],
            ['1 kB', 1024],
            ['1 kB', 1025],
            ['1.5 kB', 1536],
            ['84.4 kB', 86450],
            ['5 MB', 1048576 * 5],
            ['2 GB', 1073741824 * 2],
            ['3 TB', 1099511627776 * 3],
            ['1.18 PB', 1325899906842624],

            ['1,5 kB', 1536, 'pl'],
            ['1,18 PB', 1325899906842624, 'pl'],
        ];
    }

    /**
     * @return array
     */
    public function preciseBinarySuffixDataProvider()
    {
        return [
            // Negative case
            [-1, -1, 3],

            // Byte Cases
            ['0 bytes', 0, 3],
            ['1 bytes', 1, 0],
            ['1023 bytes', 1023, 3],

            // Kilobyte Cases
            ['1.000 kB', 1024, 3],
            ['2 kB', 1588, 0],
            ['1.6 kB', 1588, 1],
            ['1.55 kB', 1588, 2],
            ['1.551 kB', 1588, 3],

            // Megabyte Cases
            ['5.00 MB', (1048576 * 5), 2],
            ['5.00 MB', (1048576 * 5) + 600, 2],
            ['5.001 MB', (1048576 * 5) + 600, 3],

            // Gigabyte Cases
            ['2 GB', 1073741824 * 2, 0],
            ['2.0 GB', 1073741824 * 2, 1],

            // Terabyte Cases
            ['3.00 TB', 1099511627776 * 3, 2],

            // Petabyte Case
            ['1.178 PB', 1325899906842624, 3],

            // Locale Cases
            ['1,500 kB', 1536, 3, 'pl'],
            ['1,178 PB', 1325899906842624, 3, 'pl'],
        ];
    }

    /**
     * @return array
     */
    public function metricSuffixDataProvider()
    {
        return [
            ['-1', -1],
            ['0', 0],
            ['1', 1],
            ['101', 101],
            ['1k', 1000],
            ['1.2k', 1240],
            ['1.24M', 1240000],
            ['3.5M', 3500000],

            ['1,2k', 1240, 'pl'],
            ['1,24M', 1240000, 'pl'],
            ['3,5M', 3500000, 'pl'],
        ];
    }

    /**
     * @return array
     */
    public function romanDataProvider()
    {
        return [
            ['I', 1],
            ['V', 5],
            ['IX', 9],
            ['X', 10],
            ['CXXV', 125],
            ['MCCC', 1300],
            ['MMMCMXCIX', 3999],
        ];
    }

    /**
     * @return array
     */
    public function romanExceptionProvider()
    {
        return [
            [-1],
            [4000],
        ];
    }

    /**
     * @return array
     */
    public function arabicExceptionProvider()
    {
        return [
            [1234],
            [''],
            ['foobar'],
        ];
    }
}
