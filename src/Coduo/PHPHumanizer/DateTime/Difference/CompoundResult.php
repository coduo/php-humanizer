<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\DateTime\Difference;

use Coduo\PHPHumanizer\DateTime\Unit;

final class CompoundResult
{
    private Unit $unit;
    private int $quantity;

    public function __construct(Unit $unit, int $quantity)
    {
        $this->unit = $unit;
        $this->quantity = $quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setUnit(Unit $unit): void
    {
        $this->unit = $unit;
    }

    public function getUnit(): Unit
    {
        return $this->unit;
    }
}
