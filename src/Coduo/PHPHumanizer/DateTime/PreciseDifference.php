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
    private \DateTime $fromDate;

    private \DateTime $toDate;

    /**
     * @var array<Unit>
     */
    private array $units = [];

    /**
     * @var array<CompoundResult>
     */
    private array $compoundResults = [];

    public function __construct(\DateTime $fromDate, \DateTime $toDate)
    {
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->calculate();
    }

    /**
     * @return array<CompoundResult>
     */
    public function getCompoundResults(): array
    {
        return $this->compoundResults;
    }

    private function calculate(): void
    {
        /* @var $units Unit[] */
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

    public function isPast(): bool
    {
        $diff = $this->toDate->getTimestamp() - $this->fromDate->getTimestamp();

        return ($diff > 0) ? false : true;
    }
}
