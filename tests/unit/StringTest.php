<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\String;
use PHPUnit_Framework_TestCase;

/**
 * Class StringTest
 *
 * @package Coduo\PHPHumanizer\Tests
 */
class StringTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider humanizeStringProvider
     *
     * @param $input
     * @param $expected
     * @param $capitalize
     */
    public function test_humanize_strings($input, $expected, $capitalize = true)
    {
        $string = new String();

        $this->assertEquals($expected, $string->humanize($input, $capitalize));
        $this->assertEquals($expected, String::humanize($input, $capitalize));
    }

    /**
     * @dataProvider truncateStringProvider
     *
     * @param        $text
     * @param        $expected
     * @param        $charactersCount
     * @param string $append
     */
    function test_truncate_string_to_word_closest_to_a_certain_number_of_characters($text, $expected, $charactersCount, $append = '')
    {
        $string = new String();

        $this->assertEquals($expected, $string->truncate($text, $charactersCount, $append));
        $this->assertEquals($expected, String::truncate($text, $charactersCount, $append));
    }

    /**
     *
     * @return array
     */
    public function humanizeStringProvider()
    {
        return array(
            array('news_count', 'News count'),
            array('user', 'user', false),
            array('news_id', 'News'),
            array('news_count', 'News count'),
        );
    }

    /**
     * @return array
     */
    public function truncateStringProvider()
    {
        return array(
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem', 2),
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem ipsum...', 10, '...'),
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem ipsum dolorem si amet, lorem', 30),
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem', 0),
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem...', 0, '...'),
            array('Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', -2),
        );
    }
}