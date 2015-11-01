<?php

namespace Coduo\PHPHumanizer\Tests\DateTime;

use Coduo\PHPHumanizer\DateTime\Difference;
use PHPUnit_Framework_TestCase;

/**
 * Class DifferenceTest
 *
 * @package Coduo\PHPHumanizer\Tests\DateTime
 */
class DifferenceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider differenceDataProvider
     *
     * @param $expected
     * @param $firstDate
     * @param $secondDate
     * @param $instance
     * @param $isPast
     */
    public function test_calculating_differences_between_dates($expected, $firstDate, $secondDate, $instance, $isPast )
    {
        $diff = new Difference($firstDate, $secondDate);

        $this->assertTrue(is_a($diff->getUnit(), $instance));
        $this->assertEquals($expected, $diff->getQuantity());
        $this->assertEquals($isPast, $diff->isPast());
    }

    /**
     * @return array
     */
    public function differenceDataProvider()
    {
        return array(
            array(15, new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 12:45:00"), 'Coduo\PHPHumanizer\DateTime\Unit\Minute', true),
            array(15, new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 13:15:00"), 'Coduo\PHPHumanizer\DateTime\Unit\Minute', false),
            array(2, new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 11:00:00"), 'Coduo\PHPHumanizer\DateTime\Unit\Hour', true),
            array(3, new \DateTime("2014-04-26 13:00:00"), new \DateTime("2014-04-26 16:00:00"), 'Coduo\PHPHumanizer\DateTime\Unit\Hour', false),
            array(1, new \DateTime("2014-04-10"), new \DateTime("2014-04-09"), 'Coduo\PHPHumanizer\DateTime\Unit\Day', true),
            array(1, new \DateTime("2014-04-10"), new \DateTime("2014-04-11"), 'Coduo\PHPHumanizer\DateTime\Unit\Day', false),
            array(2, new \DateTime("2014-04-15"), new \DateTime("2014-04-01"), 'Coduo\PHPHumanizer\DateTime\Unit\Week', true),
            array(2, new \DateTime("2014-04-01"), new \DateTime("2014-04-15"), 'Coduo\PHPHumanizer\DateTime\Unit\Week',	false),
            array(1, new \DateTime("2014-04-01"), new \DateTime("2014-03-01"), 'Coduo\PHPHumanizer\DateTime\Unit\Month', true),
            array(1, new \DateTime("2014-04-01"), new \DateTime("2014-05-01"), 'Coduo\PHPHumanizer\DateTime\Unit\Month', false),
            array(2, new \DateTime("2014-01-01"), new \DateTime("2012-01-01"), 'Coduo\PHPHumanizer\DateTime\Unit\Year', true),
            array(1, new \DateTime("2014-01-01"), new \DateTime("2015-01-01"), 'Coduo\PHPHumanizer\DateTime\Unit\Year', false),
        );
    }
}

