<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\Unit\Day;
use Coduo\PHPHumanizer\DateTime\Unit\Hour;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use Coduo\PHPHumanizer\DateTime\Unit\Month;
use Coduo\PHPHumanizer\DateTime\Unit\Second;
use Coduo\PHPHumanizer\DateTime\Unit\Year;
use Coduo\PHPHumanizer\DateTime\Difference\CompoundResult;

final class PreciseDifference
{
    /**
     * @var \DateTime
     */
    private $fromDate;

    /**
     * @var \DateTime
     */
    private $toDate;

    /**
     * @var \Coduo\PHPHumanizer\DateTime\Unit[]
     */
    private $units;

    /**
     * @var \Coduo\PHPHumanizer\DateTime\Difference\CompoundResult[]
     */
    private $compoundResults;

    public function __construct(\DateTime $fromDate, \DateTime $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->calculate();
    }

    /**
     * @return \Coduo\PHPHumanizer\DateTime\Difference\CompoundResult[]
     */
    public function getCompoundResults()
    {
        return $this->compoundResults;
    }

    private function calculate()
    {
        /* @var $units \Coduo\PHPHumanizer\DateTime\Unit[] */
        $units = [
            new Year(),
            new Month(),
            new Day(),
            new Hour(),
            new Minute(),
            new Second(),
        ];

        $diff = $this->fromDate->diff($this->toDate);

        foreach ($units as $unit) {
            if ($diff->{$unit->getDateIntervalSymbol()} > 0) {
                $this->units[] = $unit;
                $this->compoundResults[] = new CompoundResult($unit, $diff->{$unit->getDateIntervalSymbol()});
            }
        }
    }

    public function isPast()
    {
        $diff = $this->toDate->getTimestamp() - $this->fromDate->getTimestamp();

        return ($diff > 0) ? false : true;
    }
}
