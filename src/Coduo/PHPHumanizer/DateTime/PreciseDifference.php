<?php

namespace Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\Unit\Day;
use Coduo\PHPHumanizer\DateTime\Unit\Hour;
use Coduo\PHPHumanizer\DateTime\Unit\JustNow;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use Coduo\PHPHumanizer\DateTime\Unit\Month;
use Coduo\PHPHumanizer\DateTime\Unit\Second;
use Coduo\PHPHumanizer\DateTime\Unit\Week;
use Coduo\PHPHumanizer\DateTime\Unit\Year;
use Coduo\PHPHumanizer\DateTime\Difference\CompoundResult;

class PreciseDifference
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
        $units = array(
            new Year(),
            new Month(),
            new Week(),
            new Day(),
            new Hour(),
            new Minute(),
            new Second(),
        );

        $absoluteMilliSecondsDiff = abs($this->toDate->getTimestamp() - $this->fromDate->getTimestamp()) * 1000;

        foreach ($units as $unit) {
            if ($absoluteMilliSecondsDiff >= $unit->getMilliseconds()) {
                $this->units[] = $unit;
            }
        }

        foreach ($this->units as $unit) {
            $quantity = (int) floor($absoluteMilliSecondsDiff / $unit->getMilliseconds());

            if ($quantity === 0) {
                continue;
            }

            $this->compoundResults[] = new CompoundResult($unit, $quantity);
            $absoluteMilliSecondsDiff -= ($quantity * $unit->getMilliseconds());
        }

    }

    public function isPast()
    {
        $diff = $this->toDate->getTimestamp() - $this->fromDate->getTimestamp();
        return ($diff > 0) ? false : true;
    }
}
