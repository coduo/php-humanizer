<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\String;

interface TruncateInterface
{
    /**
     * @param string $text
     * @param int    $charactersCount
     *
     * @return string mixed
     */
    public function truncate($text, $charactersCount);
}
