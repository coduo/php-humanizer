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
     * Returns symbol of \DateInterval equivalent.
     *
     * @return string
     */
    public function getDateIntervalSymbol();
}
