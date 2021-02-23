<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Number\Ordinal;

final class Builder
{
    /**
     * Find a proper strategy for ordinal numbers.
     */
    public static function build(string $locale) : StrategyInterface
    {
        // $locale should be xx or xx_YY
        if (!\preg_match('#^([a-z]{2})(_([A-Z]{2}))?$#', $locale, $m)) {
            throw new \RuntimeException(\sprintf("Invalid locale specified: '%s'.", $locale));
        }

        $strategy = \ucfirst($m[1]);

        if (!empty($m[3])) {
            $strategy .= \sprintf('_%s', $m[3]);
        }

        $strategy = \sprintf('\Coduo\PHPHumanizer\Resources\Ordinal\%sStrategy', $strategy);

        if (\class_exists($strategy)) {
            $strategyInstance = new $strategy();

            if (!$strategyInstance instanceof StrategyInterface) {
                throw new \RuntimeException(\sprintf('Strategy for locale %s does not implement Strategy Interface.', $locale));
            }

            return $strategyInstance;
        }

        // Debatable: should we fallback to English?
        // return self::build('en');
        throw new \RuntimeException(\sprintf('Strategy for locale %s not found.', $locale));
    }
}
