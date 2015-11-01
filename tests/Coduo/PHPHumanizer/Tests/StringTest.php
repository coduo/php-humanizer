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
     */
    public function test_humanize_strings($input, $expected, $capitalize, $separator)
    {
        $this->assertEquals($expected, String::humanize($input, $capitalize, $separator));
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
        $this->assertEquals($expected, String::truncate($text, $charactersCount, $append));
    }

    /**
     *
     * @return array
     */
    public function humanizeStringProvider()
    {
        return array(
            array('news_count', 'News count', true, '_'),
            array('user', 'user', false, '_'),
            array('news_id', 'News', true, '_'),
            array('news_count', 'News count', true),
            array('news-count', 'News count', true, '-'),
            array('news-count', 'news count', false, '-')
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