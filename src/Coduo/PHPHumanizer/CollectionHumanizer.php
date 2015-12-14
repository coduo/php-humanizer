<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\Collection\Formatter;
use Coduo\PHPHumanizer\Collection\Oxford;
use Coduo\PHPHumanizer\Translator\Builder;

final class CollectionHumanizer
{
    /**
     * @param $collection
     * @param null $limit
     * @param string $locale
     * @return string
     */
    public static function oxford($collection, $limit = null, $locale = 'en')
    {
        $oxford = new Oxford(
            new Formatter(Builder::build($locale))
        );

        return $oxford->format($collection, $limit);
    }
}
