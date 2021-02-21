<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Number;

use Coduo\PHPHumanizer\Number\Ordinal\Builder;
use Coduo\PHPHumanizer\Number\Ordinal\StrategyInterface;

final class Ordinal
{
    /**
     * @var int|float
     */
    private $number;

    private StrategyInterface $strategy;

    /**
     * @param int|float $number
     * @param string    $locale
     */
    public function __construct($number, string $locale)
    {
        $this->number = $number;
        $this->strategy = Builder::build($locale);
    }

    public function isPrefix(): bool
    {
        return $this->strategy->isPrefix();
    }

    public function __toString(): string
    {
        return $this
            ->strategy
            ->ordinalIndicator($this->number);
    }
}
