<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime;

use Coduo\PHPHumanizer\DateTime\Difference\CompoundResult;
use Coduo\PHPHumanizer\DateTime\Unit\Day;
use Coduo\PHPHumanizer\DateTime\Unit\Hour;
use Coduo\PHPHumanizer\DateTime\Unit\Minute;
use Coduo\PHPHumanizer\DateTime\Unit\Month;
use Coduo\PHPHumanizer\DateTime\Unit\Second;
use Coduo\PHPHumanizer\DateTime\Unit\Year;

final class DateIntervalCompound
{
    private \DateInterval $dateInterval;

    public function __construct(\DateInterval $dateInterval)
    {
        $this->dateInterval = $dateInterval;
    }

    /**
     * @return array<CompoundResult>
     */
    public function components() : array
    {
        /* @var Unit[] $units */
        $units = [
            new Year(),
            new Month(),
            new Day(),
            new Hour(),
            new Minute(),
            new Second(),
        ];

        /** @var array<CompoundResult> $compoundResults */
        $compoundResults = [];

        foreach ($units as $unit) {
            if ($this->dateInterval->{$unit->getDateIntervalSymbol()} > 0) {
                $compoundResults[] = new CompoundResult($unit, (int) $this->dateInterval->{$unit->getDateIntervalSymbol()});
            }
        }

        return $compoundResults;
    }
}
