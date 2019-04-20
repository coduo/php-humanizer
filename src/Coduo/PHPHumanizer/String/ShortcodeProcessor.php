<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

use Thunder\Shortcode\HandlerContainer\HandlerContainer;
use Thunder\Shortcode\Parser\RegularParser;
use Thunder\Shortcode\Processor\Processor;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

final class ShortcodeProcessor
{
    /**
     * Removes all shortcodes from given text.
     *
     * @param string $text
     *
     * @return string
     */
    public function removeShortcodes($text)
    {
        $nullHandler = function () {
            return;
        };

        return $this->createShortcodeProcessor($nullHandler)->process($text);
    }

    /**
     * Removes only shortcode tags from given text (leaves their content as it is).
     *
     * @param string $text
     *
     * @return string
     */
    public function removeShortcodeTags($text)
    {
        $contentHandler = function (ShortcodeInterface $s) {
            return $s->getContent();
        };

        return $this->createShortcodeProcessor($contentHandler)->process($text);
    }

    /**
     * @param $defaultHandler
     * @return Processor
     */
    private function createShortcodeProcessor($defaultHandler)
    {
        $handlers = new HandlerContainer();
        $handlers->setDefault($defaultHandler);

        return new Processor(new RegularParser(), $handlers);
    }
}
