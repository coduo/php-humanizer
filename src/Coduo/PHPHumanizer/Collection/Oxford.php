<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Collection;

final class Oxford
{
    private Formatter $formatter;

    public function __construct(Formatter $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param array<string> $collection
     */
    public function format(array $collection, int $limit = null) : string
    {
        return $this->formatter->format($collection, $limit);
    }
}
