<?php

namespace Coduo\PHPHumanizer\String;

class HtmlTruncate implements Truncate
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $charactersCount;

    /**
     * @var string
     */
    private $append;

    /**
     * @var string
     */
    private $allowedTags;

    /**
     * @var Breakpoint
     */
    private $breakpoint;

    /**
     * @param string $text
     * @param int    $charactersCount
     * @param string $allowedTags
     * @param string $append
     */
    public function __construct($text, $charactersCount, $allowedTags = '<b><i><u><em><strong><a><span>', $append = '')
    {
        $this->text            = $text;
        $this->charactersCount = $charactersCount;
        $this->append          = $append;
        $this->allowedTags     = $allowedTags;
    }

    /**
     * @param Breakpoint $breakpoint
     *
     * @return TextTruncate
     */
    public function setBreakpoint($breakpoint)
    {
        $this->breakpoint = $breakpoint;
        return $this;
    }

    /**
     * @return string
     */
    public function truncate()
    {
        $string = strip_tags($this->text, $this->allowedTags);
        return $this->truncateHtml($string);
    }

    public function __toString()
    {
        return $this->truncate();
    }

    /**
     * Return the length of the newly truncated string using the breakpoint
     *
     * @param string $text
     * @param int    $charCount
     *
     * @return int
     */
    private function getLength($text, $charCount)
    {
        $length = $this->charactersCount;
        if (!empty($this->breakpoint)) {
            $length = $this->breakpoint->calculatePosition($text, $charCount);
        }
        return $length;
    }

    /**
     * Truncates a string to the given length.  It will optionally preserve
     * HTML tags if $is_html is set to true.
     *
     * Adapted from FuelPHP Str::truncate (https://github.com/fuelphp/common/blob/master/src/Str.php)
     *
     * @param string $string
     *
     * @return  string  the truncated string
     */
    private function truncateHtml($string)
    {
        $limit        = $this->charactersCount;
        $continuation = $this->append;
        $offset       = 0;
        $tags         = array();
        // Handle special characters.
        preg_match_all('/&[a-z]+;/i', strip_tags($string), $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach ($matches as $match) {
            if ($match[0][1] >= $limit) {
                break;
            }
            $limit += (mb_strlen($match[0][0]) - 1);
        }

        // Handle all the html tags.
        preg_match_all('/<[^>]+>([^<]*)/', $string, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach ($matches as $match) {
            if ($match[0][1] - $offset >= $limit) {
                break;
            }
            $tag = mb_substr(strtok($match[0][0], " \t\n\r\0\x0B>"), 1);
            if ($tag[0] != '/') {
                $tags[] = $tag;
            } elseif (end($tags) == mb_substr($tag, 1)) {
                array_pop($tags);
            }
            $offset += $match[1][1] - $match[0][1];
        }

        $new_string = mb_substr($string, 0, $limit = min(mb_strlen($string), $this->getLength($string, $limit + $offset)));
        $new_string .= (mb_strlen($string) > $limit ? $continuation : '');
        $new_string .= (count($tags = array_reverse($tags)) ? '</'.implode('></', $tags).'>' : '');
        return $new_string;
    }

}
