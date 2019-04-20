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
    /**
     * @var \Coduo\PHPHumanizer\DateTime\Unit
     */
    private $unit;
    private $quantity;

    public function __construct(Unit $unit, $quantity)
    {
        $this->unit = $unit;
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param \Coduo\PHPHumanizer\DateTime\Unit $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return \Coduo\PHPHumanizer\DateTime\Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
}
