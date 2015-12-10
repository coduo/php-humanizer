<?php

namespace Coduo\PHPHumanizer;

use Coduo\PHPHumanizer\Collection\Formatter;
use Coduo\PHPHumanizer\Collection\Oxford;
use Coduo\PHPHumanizer\Translator\Builder;

class CollectionHumanizer
{
    public static function oxford($collection, $limit = null, $locale = 'en')
    {
        $oxford = new Oxford(
            new Formatter(Builder::build($locale))
        );

        return $oxford->format($collection, $limit);
    }
}
