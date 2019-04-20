<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Number\Ordinal;

/**
 * Tries to find a proper  strategy for ordinal numbers.
 */
final class Builder
{
    /**
     * @param string $locale
     *
     * @return StrategyInterface
     *
     * @throws \RuntimeException
     */
    public static function build($locale)
    {
        // $locale should be xx or xx_YY
        if (!\preg_match('/^([a-z]{2})(_([A-Z]{2}))?$/', $locale, $m)) {
            throw new \RuntimeException("Invalid locale specified: '$locale'.");
        }

        $strategy = \ucfirst($m[1]);
        if (!empty($m[3])) {
            $strategy .= "_$m[3]";
        }

        $strategy = "\\Coduo\\PHPHumanizer\\Resources\\Ordinal\\{$strategy}Strategy";

        if (\class_exists($strategy)) {
            return new $strategy();
        }

        // Debatable: should we fallback to English?
        // return self::build('en');
        throw new \RuntimeException("Strategy for locale $locale not found.");
    }
}
