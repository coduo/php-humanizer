<?php

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
