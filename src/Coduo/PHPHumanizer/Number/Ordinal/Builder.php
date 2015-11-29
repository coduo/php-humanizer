<?php

namespace Coduo\PHPHumanizer\Number\Ordinal;

/**
 * Tries to find a proper strategy for ordinal numbers.
 */
class Builder
{
    /**
     * @param string $locale
     * @return StrategyInterface
     * @throws \RuntimeException
     */
    public static function build($locale)
    {
        
        if (!preg_match('/^([a-z]{2})(_([A-Z]{2}))?$/', $locale, $m)) {
            throw new \RuntimeException("Invalid locale specified: '$locale'.");
        }
        $strategy = ucfirst($m[1]);
        if (!empty($m[3])) {
            $strategy .= "_$m[3]";
        }
        $strategy .= ".xml";
    }
} 
?>