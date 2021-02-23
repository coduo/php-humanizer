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

    /**
     * @var int|float
     */
    private $quantity;

    /**
     * @param int|float $quantity
     */
    public function __construct(Unit $unit, $quantity)
    {
        $this->unit = $unit;
        $this->quantity = $quantity;
    }

    /**
     * @return int|float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getUnit(): Unit
    {
        return $this->unit;
    }
}
