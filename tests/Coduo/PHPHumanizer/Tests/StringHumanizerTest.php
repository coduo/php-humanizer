<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    public function test_truncate_string_to_word_closest_to_a_certain_number_of_characters($text, $expected, $charactersCount, $append = '')
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
    public function test_truncate_string_to_word_closest_to_a_certain_number_of_characters_with_html_tags($text, $charactersCount, $allowedTags, $expected, $append = '')
    {
        $this->assertEquals($expected, StringHumanizer::truncateHtml($text, $charactersCount, $allowedTags, $append));
    }

    /**
     * @dataProvider removeAllShortcodesProvider
     *
     * @param $text
     * @param $expected
     */
    public function test_remove_all_shortcodes_from_text($text, $expected)
    {
        $this->assertEquals($expected, StringHumanizer::removeShortcodes($text));
    }

    /**
     * @dataProvider removeShortcodeTagsProvider
     *
     * @param $text
     * @param $expected
     */
    public function test_remove_only_shortcode_tags_from_text($text, $expected)
    {
        $this->assertEquals($expected, StringHumanizer::removeShortcodeTags($text));
    }

    public function removeAllShortcodesProvider()
    {
        return [
            ['some [text] containing [shortcodes /] and [stuff]with[/stuff] content', 'some  containing  and  content'],
            ['some [text] containing [shortcodes /] and [stuff]with[/stuff] content [/text]', 'some '],
        ];
    }

    public function removeShortcodeTagsProvider()
    {
        return [
            ['some [text] containing [shortcodes /] and [stuff]with[/stuff] content', 'some  containing  and with content'],
            ['some [text] containing [shortcodes /] and [stuff]with[/stuff] content [/text]', 'some  containing  and with content '],
        ];
    }

    /**
     * @return array
     */
    public function humanizeStringProvider()
    {
        return [
            ['news_count', 'News count', true, '_', ['id']],
            ['user', 'user', false, '_', ['id']],
            ['news_id', 'News', true, '_', ['id']],
            ['customer_id', 'Customer id', true, '_', []],
            ['news_count', 'News count', true, '_', ['id']],
            ['news-count', 'News count', true, '-', ['id']],
            ['news-count', 'news count', false, '-', ['id']]
        ];
    }

    /**
     *
     * @return array
     */
    public function truncateStringProvider()
    {
        $longText = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';
        $shortText = 'Short text';

        return [
            [$longText, 'Lorem', 2],
            [$longText, 'Lorem ipsum...', 10, '...'],
            [$longText, 'Lorem ipsum dolorem si amet, lorem', 30],
            [$longText, 'Lorem', 0],
            [$longText, 'Lorem...', 0, '...'],
            [$longText, 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.', -2],
            [$shortText, 'Short...', 1,  '...'],
            [$shortText, 'Short...', 2,  '...'],
            [$shortText, 'Short...', 3,  '...'],
            [$shortText, 'Short...', 4,  '...'],
            [$shortText, 'Short...', 5,  '...'],
            [$shortText, 'Short text', 6,  '...'],
            [$shortText, 'Short text', 7,  '...'],
            [$shortText, 'Short text', 8,  '...'],
            [$shortText, 'Short text', 9,  '...'],
            [$shortText, 'Short text', 10, '...']
        ];
    }

    /**
     *
     * @return array
     */
    public function truncateHtmlStringProvider()
    {
        $text = '<p><b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create <a href="/wiki/Web_page" title="Web page">web pages</a>.<sup id="cite_ref-1" class="reference"><a href="#cite_note-1"><span>[</span>1<span>]</span></a></sup> <a href="/wiki/Web_browser" title="Web browser">Web browsers</a> can read HTML files and render them into visible or audible web pages. HTML describes the structure of a <a href="/wiki/Website" title="Website">website</a> <a href="/wiki/Semantic" title="Semantic" class="mw-redirect">semantically</a> along with cues for presentation, making it a markup language, rather than a <a href="/wiki/Programming_language" title="Programming language">programming language</a>.</p>';

        return [
            [$text, 3,  '<b><i><u><em><strong><a><span>',  '<b>HyperText</b>'],
            [$text, 12, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup</b>'],
            [$text, 30, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly'],
            [$text, 50, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as'],
            [$text, 75, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup</a>'],
            [$text, 100,'<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create'],
            [$text, 3  , '', 'HyperText'],
            [$text, 12 , '', 'HyperText Markup'],
            [$text, 50 , '', 'HyperText Markup Language, commonly referred to as'],
            [$text, 75 , '', 'HyperText Markup Language, commonly referred to as HTML, is the standard markup'],
            [$text, 100, '', 'HyperText Markup Language, commonly referred to as HTML, is the standard markup language used to create'],
            [$text, 50, '', 'HyperText Markup Language, commonly referred to as...', '...'],
            [$text, 75, '<b><i><u><em><strong><a><span>', '<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup...</a>', '...']
        ];
    }
}
