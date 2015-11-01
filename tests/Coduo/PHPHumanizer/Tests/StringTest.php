<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\String;
use PHPUnit_Framework_TestCase;

class StringTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider humanizeStringProvider
     *
     * @param $input
     * @param $expected
     * @param $capitalize
     * @param $separator
     * @param array $forbiddenWords
     */
    public function test_humanize_strings($input, $expected, $capitalize, $separator, array $forbiddenWords)
    {
        $this->assertEquals($expected, String::humanize($input, $capitalize, $separator, $forbiddenWords));
    }

    /**
     * @dataProvider truncateStringProvider
     *
     * @param $text
     * @param $expected
     * @param $charactersCount
     * @param string $append
     */
    function test_truncate_string_to_word_closest_to_a_certain_number_of_characters($text, $expected, $charactersCount, $append = '')
    {
        $this->assertEquals($expected, String::truncate($text, $charactersCount, $append));
    }

    /**
     *
     * @return array
     */
    public function humanizeStringProvider()
    {
        return array(
            array('news_count', 'News count', true, '_', array('id')),
            array('user', 'user', false, '_', array('id')),
            array('news_id', 'News', true, '_', array('id')),
            array('customer_id', 'Customer id', true, '_', array()),
            array('news_count', 'News count', true, '_', array('id')),
            array('news-count', 'News count', true, '-', array('id')),
            array('news-count', 'news count', false, '-', array('id'))
        );
    }

    /**
     * @return array
     */
    public function truncateStringProvider()
    {
        $longText = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';
        $shortText = 'Short text';
        
        return array(
            array($longText, 'Lorem', 2),
            array($longText, 'Lorem ipsum...', 10, '...'),
            array($longText, 'Lorem ipsum dolorem si amet, lorem', 30),
            array($longText, 'Lorem', 0),
            array($longText, 'Lorem...', 0, '...'),
            array($longText, 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', -2),
            array($shortText, "Short...", 1,  '...'),
            array($shortText, "Short...", 2,  '...'),
            array($shortText, "Short...", 3,  '...'),
            array($shortText, "Short...", 4,  '...'),
            array($shortText, "Short...", 5,  '...'),
            array($shortText, "Short...", 6,  '...'),
            array($shortText, "Short text", 7,  '...'),
            array($shortText, "Short text", 8,  '...'),
            array($shortText, "Short text", 9,  '...'),
            array($shortText, "Short text", 10, '...')
        );
    }
}