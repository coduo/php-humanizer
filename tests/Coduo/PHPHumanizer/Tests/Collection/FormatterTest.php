<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Tests\Collection;

use Coduo\PHPHumanizer\Collection\Formatter;
use Coduo\PHPHumanizer\Translator\Builder;
use PHPUnit\Framework\TestCase;

final class FormatterTest extends TestCase
{
    public function test_formats_two_elements()
    {
        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            'Michal and Norbert',
            $formatter->format(['Michal', 'Norbert'], null)
        );
    }

    public function test_formats_elements_with_limit()
    {
        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            'Michal, Norbert, and 1 other',
            $formatter->format(['Michal', 'Norbert', 'Lukasz'], 2)
        );
    }

    public function test_formats_elements_without_limit()
    {
        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame(
            'Michal, Norbert, and Lukasz',
            $formatter->format(['Michal', 'Norbert', 'Lukasz'], null)
        );
    }
}
