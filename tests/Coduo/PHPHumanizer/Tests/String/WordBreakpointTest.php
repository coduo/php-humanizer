<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests\String;

use Coduo\PHPHumanizer\String\WordBreakpoint;
use PHPUnit\Framework\TestCase;

final class WordBreakpointTest extends TestCase
{
    public function test_calculate_breakpoint_position_when_sentence_is_longer_than_characters_count() : void
    {
        $wordBreakpoint = new WordBreakpoint();

        $this->assertSame(5, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 2));
        $this->assertSame(5, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 4));
        $this->assertSame(5, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 5));
        $this->assertSame(11, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 10));
        $this->assertSame(19, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', -2));
        $this->assertSame(5, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 0));
    }

    public function test_calculate_breakpoint_position_when_sentence_is_shorter_than_characters_count() : void
    {
        $wordBreakpoint = new WordBreakpoint();

        $this->assertSame(19, $wordBreakpoint->calculatePosition('Lorem ipsum dolorem', 20));
    }

    public function test_calculate_breakpoint_position_when_characters_count_ends_in_last_word() : void
    {
        $wordBreakpoint = new WordBreakpoint();

        $this->assertSame(11, $wordBreakpoint->calculatePosition('Lorem ipsum', 7));
    }

    public function test_calculate_breakpoint_position_when_characters_count_ends_in_last_space() : void
    {
        $wordBreakpoint = new WordBreakpoint();

        $this->assertSame(5, $wordBreakpoint->calculatePosition('Lorem ipsum', 5));
    }
}
