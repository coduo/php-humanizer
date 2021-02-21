<?php

declare(strict_types=1);

namespace Coduo\PHPHumanizer\Tests\DateTime;

use Coduo\PHPHumanizer\DateTime\Difference;
use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\Translator\Builder;
use PHPUnit\Framework\TestCase;

final class FormatterTest extends TestCase
{
    public function test_format_datetime_diff() : void
    {
        $diff = new Difference(
            new \DateTime("2015-01-01 00:10:00"),
            new \DateTime("2015-01-01 00:00:00")
        );

        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame('10 minutes ago', $formatter->formatDifference($diff));
    }

    public function test_format_datetime_diff_for_specific_locale() : void
    {
        $diff = new Difference(
            new \DateTime("2015-01-01 00:10:00"),
            new \DateTime("2015-01-01 00:00:00")
        );

        $formatter = new Formatter(Builder::build('en'));

        $this->assertSame('10 minut temu', $formatter->formatDifference($diff, 'pl'));
    }
}