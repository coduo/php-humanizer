<?php

namespace Coduo\PHPHumanizer\Collection;

final class Oxford
{
    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * Oxford constructor.
     *
     * @param Formatter $formatter
     */
    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param $collection
     * @param null $limit
     *
     * @return string
     */
    public function format($collection, $limit = null)
    {
        return $this->formatter->format($collection, $limit);
    }
}
