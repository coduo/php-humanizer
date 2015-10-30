<?php

namespace Coduo\PHPHumanizer\Number;

class Ordinal
{
    /**
     * @var int|float
     */
    private $number;

    /**
     * @var callable
     */
    private $translator;

    /**
     * @param int|float $number
     * @param string $locale
     */
    public function __construct($number, $locale = 'en')
    {
        $this->number = $number;
        $this->translator = Ordinal\Builder::build($locale);
    }

    public function __toString()
    {
        $closure = $this->translator;
        return (string) $closure($this->number);
    }
}
