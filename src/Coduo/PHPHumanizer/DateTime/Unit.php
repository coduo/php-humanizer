<?php

namespace Coduo\PHPHumanizer\DateTime;

interface Unit
{
    /**
     * @return string
     */
    public function getName();

    /**
     * Return millisecond that represents unit.
     *
     * @return int
     */
    public function getMilliseconds();

    /**
     * @return int
     */
    public function getThresholdQuantity();
}
