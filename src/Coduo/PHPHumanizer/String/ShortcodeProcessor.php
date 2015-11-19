<?php

namespace Coduo\PHPHumanizer\String;

use Thunder\Shortcode\HandlerContainer\HandlerContainer;
use Thunder\Shortcode\Parser\RegularParser;
use Thunder\Shortcode\Processor\Processor;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

class ShortcodeProcessor
{
    public function __construct()
    {
    }

    /**
     * Removes all shortcodes from given text
     *
     * @param string $text
     *
     * @return string
     */
    public function removeShortcodes($text)
    {
        $nullHandler = function() {
            return null;
        };

        return $this->createShortcodeProcessor($nullHandler)->process($text);
    }

    /**
     * Removes only shortcode tags from given text (leaves their content as it is)
     *
     * @param string $text
     *
     * @return string
     */
    public function removeShortcodeTags($text)
    {
        $contentHandler = function(ShortcodeInterface $s) {
            return $s->getContent();
        };

        return $this->createShortcodeProcessor($contentHandler)->process($text);
    }

    private function createShortcodeProcessor($defaultHandler)
    {
        $handlers = new HandlerContainer();
        $handlers->setDefault($defaultHandler);

        return new Processor(new RegularParser(), $handlers);
    }
}
