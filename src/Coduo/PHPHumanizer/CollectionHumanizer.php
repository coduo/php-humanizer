<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
