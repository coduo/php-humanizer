<?php

namespace Coduo\PHPHumanizer\Number\Ordinal;

/**
 * Tries to find a proper "translator" for ordinal numbers.
 */
class Builder
{
    /**
     * @param string $locale
     * @return Closure
     */
    public static function build($locale)
    {
        $base = __DIR__ . '/../../Resources/translations/ordinal';
        $file = "$base.$locale.php";

        if (file_exists($file)) {
            $translator = require $file;
        } else {
            // Fall-back
            $translator = function ($number) {
                return $number;
            };
        }

        return $translator;
    }
}
