<?php

namespace Coduo\PHPHumanizer\Tests;

use Coduo\PHPHumanizer\StringHumanizer;
use PHPUnit_Framework_TestCase;

class StringHumanizerTest extends PHPUnit_Framework_TestCase
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
        $this->assertEquals($expected, StringHumanizer::humanize($input, $capitalize, $separator, $forbiddenWords));
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
        $this->assertEquals($expected, StringHumanizer::truncate($text, $charactersCount, $append));
    }

    /**
     * @dataProvider truncateHtmlStringProvider
     *
     * @param $text
     * @param $charactersCount
     * @param $allowedTags
     * @param $expected
     * @param $append
     */
    function test_truncate_string_to_word_closest_to_a_certain_number_of_characters_with_html_tags($text, $charactersCount, $allowedTags, $expected, $append = '')
    {
        $this->assertEquals($expected, StringHumanizer::truncateHtml($text, $charactersCount, $allowedTags, $append));
    }

    /**
     * @dataProvider removeAllShortcodesProvider
     *
     * @param $text
     * @param $expected
     */
    function test_remove_all_shortcodes_from_text($text, $expected)
    {
        $this->assertEquals($expected, StringHumanizer::removeShortcodes($text));
    }

    /**
     * @dataProvider removeShortcodeTagsProvider
     *
     * @param $text
     * @param $expected
     */
    function test_remove_only_shortcode_tags_from_text($text, $expected)
    {
        $this->assertEquals($expected, StringHumanizer::removeShortcodeTags($text));
    }

    public function removeAllShortcodesProvider()
    {
        return array(
            array('some [text] containing [shortcodes /] and [stuff]with[/stuff] content', 'some  containing  and  content'),
            array('some [text] containing [shortcodes /] and [stuff]with[/stuff] content [/text]', 'some '),
        );
    }

    public function removeShortcodeTagsProvider()
    {
        return array(
            array('some [text] containing [shortcodes /] and [stuff]with[/stuff] content', 'some  containing  and with content'),
            array('some [text] containing [shortcodes /] and [stuff]with[/stuff] content [/text]', 'some  containing  and with content '),
        );
    }

    /**
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
     *
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
            array($shortText, "Short text", 6,  '...'),
            array($shortText, "Short text", 7,  '...'),
            array($shortText, "Short text", 8,  '...'),
            array($shortText, "Short text", 9,  '...'),
            array($shortText, "Short text", 10, '...')
        );
    }

    /**
     *
     * @return array
     */
    public function truncateHtmlStringProvider()
    {
        $text = '<p><b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create <a href="/wiki/Web_page" title="Web page">web pages</a>.<sup id="cite_ref-1" class="reference"><a href="#cite_note-1"><span>[</span>1<span>]</span></a></sup> <a href="/wiki/Web_browser" title="Web browser">Web browsers</a> can read HTML files and render them into visible or audible web pages. HTML describes the structure of a <a href="/wiki/Website" title="Website">website</a> <a href="/wiki/Semantic" title="Semantic" class="mw-redirect">semantically</a> along with cues for presentation, making it a markup language, rather than a <a href="/wiki/Programming_language" title="Programming language">programming language</a>.</p>';

        return array(
            array($text, 3,  '<b><i><u><em><strong><a><span>',  "<b>HyperText</b>"),
            array($text, 12, '<b><i><u><em><strong><a><span>', "<b>HyperText Markup</b>"),
            array($text, 30, '<b><i><u><em><strong><a><span>', "<b>HyperText Markup Language</b>, commonly"),
            array($text, 50, '<b><i><u><em><strong><a><span>', "<b>HyperText Markup Language</b>, commonly referred to as"),
            array($text, 75, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup</a>'),
            array($text, 100,'<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create'),
            array($text, 3  , '', "HyperText"),
            array($text, 12 , '', "HyperText Markup"),
            array($text, 50 , '', "HyperText Markup Language, commonly referred to as"),
            array($text, 75 , '', "HyperText Markup Language, commonly referred to as HTML, is the standard markup"),
            array($text, 100, '', "HyperText Markup Language, commonly referred to as HTML, is the standard markup language used to create"),
            array($text, 50, '', "HyperText Markup Language, commonly referred to as...", '...'),
            array($text, 75, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup...</a>', '...')
        );
    }
}
