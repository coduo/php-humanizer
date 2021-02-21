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
use Coduo\PHPHumanizer\Collection\Oxford;
use Coduo\PHPHumanizer\Translator\Builder;
use PHPUnit\Framework\TestCase;

final class OxfordTest extends TestCase
{
    public function test_returns_empty_string_when_collection_is_empty() : void
    {
        $this->assertSame(
            '',
            (new Oxford(new Formatter(Builder::build('en'))))->format([])
        );
    }

    public function test_returns_collection_item_string_when_collection_has_one_element() : void
    {
        $this->assertSame(
            'Michal',
            (new Oxford(new Formatter(Builder::build('en'))))->format(['Michal'])
        );
    }
}
