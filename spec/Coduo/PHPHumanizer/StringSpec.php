<?php

namespace spec\Coduo\PHPHumanizer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringSpec extends ObjectBehavior
{
    function it_humanize_string()
    {
        $this->humanize('news_count')->shouldReturn('News count');
    }

    function it_humanize_strings_without_capitalize()
    {
        $this->humanize('user', false)->shouldReturn('user');
    }

    function it_humanize_string_excluding_forbidden_words()
    {
        $this->humanize('news_id')->shouldReturn('News');
    }

    function it_truncate_string_to_word_closest_to_a_certain_number_of_characters()
    {
        $text = 'Lorem ipsum dolorem si amet, lorem ipsum. Dolorem sic et nunc.';

        $this->truncate($text, 2)->shouldReturn("Lorem");
        $this->truncate($text, 10, '...')->shouldReturn("Lorem ipsum...");
        $this->truncate($text, 30)->shouldReturn("Lorem ipsum dolorem si amet, lorem");
        $this->truncate($text, 0)->shouldReturn("Lorem");
        $this->truncate($text, 0, '...')->shouldReturn("Lorem...");
        $this->truncate($text, -2)->shouldReturn($text);

        $textShort = 'Short text';
        $this->truncate($textShort, 1, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 2, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 3, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 4, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 5, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 6, '...')->shouldReturn("Short...");
        $this->truncate($textShort, 7, '...')->shouldReturn("Short text");
        $this->truncate($textShort, 8, '...')->shouldReturn("Short text");
        $this->truncate($textShort, 9, '...')->shouldReturn("Short text");
        $this->truncate($textShort, 10, '...')->shouldReturn("Short text");
    }


    function it_truncate_string_to_word_closest_to_a_certain_number_of_characters_with_html_tags()
    {
        $text = '<p><b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create <a href="/wiki/Web_page" title="Web page">web pages</a>.<sup id="cite_ref-1" class="reference"><a href="#cite_note-1"><span>[</span>1<span>]</span></a></sup> <a href="/wiki/Web_browser" title="Web browser">Web browsers</a> can read HTML files and render them into visible or audible web pages. HTML describes the structure of a <a href="/wiki/Website" title="Website">website</a> <a href="/wiki/Semantic" title="Semantic" class="mw-redirect">semantically</a> along with cues for presentation, making it a markup language, rather than a <a href="/wiki/Programming_language" title="Programming language">programming language</a>.</p>';


        // Test with allowed tags
        $this->truncateHtml($text, 3)->shouldReturn("<b>HyperText</b>");
        $this->truncateHtml($text, 12)->shouldReturn("<b>HyperText Markup</b>");
        $this->truncateHtml($text, 50)->shouldReturn("<b>HyperText Markup Language</b>, commonly referred to as");
        $this->truncateHtml($text, 75)->shouldReturn('<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup</a>');
        $this->truncateHtml($text, 100)->shouldReturn('<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup language</a> used to create');

        // Test without tags

        $this->truncateHtml($text, 3, '')->shouldReturn("HyperText");
        $this->truncateHtml($text, 12, '')->shouldReturn("HyperText Markup");
        $this->truncateHtml($text, 50, '')->shouldReturn("HyperText Markup Language, commonly referred to as");
        $this->truncateHtml($text, 75, '')->shouldReturn('HyperText Markup Language, commonly referred to as HTML, is the standard markup');
        $this->truncateHtml($text, 100, '')->shouldReturn('HyperText Markup Language, commonly referred to as HTML, is the standard markup language used to create');

        // Test with append
        $this->truncateHtml($text, 50, '', '...')->shouldReturn("HyperText Markup Language, commonly referred to as...");
        $this->truncateHtml($text, 75, '<b><i><u><em><strong><a><span>', '...')->shouldReturn('<b>HyperText Markup Language</b>, commonly referred to as <b>HTML</b>, is the standard <a href="/wiki/Markup_language" title="Markup language">markup...</a>');
    }
}
