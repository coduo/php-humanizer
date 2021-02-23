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
     */
    public function removeShortcodes(string $text) : string
    {
        return $this->createShortcodeProcessor(
            function () : void {
            }
        )->process($text);
    }

    /**
     * Removes only shortcode tags from given text (leaves their content as it is).
     */
    public function removeShortcodeTags(string $text) : string
    {
        return $this->createShortcodeProcessor(fn (ShortcodeInterface $s) : ?string => $s->getContent())->process($text);
    }

    private function createShortcodeProcessor(callable $defaultHandler) : Processor
    {
        $handlers = new HandlerContainer();
        $handlers->setDefault($defaultHandler);

        return new Processor(new RegularParser(), $handlers);
    }
}
