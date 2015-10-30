<?php

namespace Coduo\PHPHumanizer\Collection;

class Oxford
{
    /**
     * @var Formatter
     */
    private $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    public function format($collection, $limit = null)
    {
        return $this->formatter->format($collection, $limit);
    }
}
