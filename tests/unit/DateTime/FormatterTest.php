<?php

namespace Coduo\PHPHumanizer\Tests\DateTime;

use Coduo\PHPHumanizer\DateTime\Formatter;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use PHPUnit_Framework_TestCase;

/**
 * Class FormatterTest
 *
 * @package Coduo\PHPHumanizer\Tests\DateTime
 */
class FormatterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider formatterDataProvider
     *
     * @param        $unit
     * @param        $quantity
     * @param        $isPast
     * @param        $formatted
     * @param string $locale
     */
    public function test_formatting_datetimes($unit, $quantity, $isPast, $formatted, $locale = 'en')
    {
        $translator = $this->prophesize('Symfony\Component\Translation\Translator');

        $translator->transChoice(
            'minute.past',
            10,
            array('%count%' => 10),
            'difference',
            'en'
        )->willReturn('10 minutes ago');

        $translator->transChoice(
            'minute.past',
            10,
            array('%count%' => 10),
            'difference',
            'pl'
        )->willReturn('10 minut temu');

        $diff = $this->prophesize('\Coduo\PHPHumanizer\DateTime\Difference');

        $diff->getUnit()->willReturn($unit);
        $diff->getQuantity()->willReturn($quantity);
        $diff->isPast()->willReturn($isPast);

        $formatter = new Formatter($translator->reveal());

        $this->assertEquals($formatted, $formatter->formatDifference($diff->reveal(), $locale));
    }

    /**
     * @return array
     */
    public function formatterDataProvider()
    {
        return array(
            array(new Minute(), 10, true, '10 minutes ago'),
            array(new Minute(), 10, true, '10 minut temu', 'pl'),
        );
    }
}