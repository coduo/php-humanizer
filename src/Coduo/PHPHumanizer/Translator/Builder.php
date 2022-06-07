<?php

declare(strict_types=1);

/*
 * This file is part of the PHP Humanizer Library.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coduo\PHPHumanizer\Translator;

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;

final class Builder
{
    /**
     * @var array<string, Translator>
     */
    private static array $translators = [];

    public static function build(string $locale) : Translator
    {
        if (!isset(self::$translators[$locale])) {
            $translator = new Translator($locale);
            $translator->addLoader('yml', new YamlFileLoader());

            $iterator = new \FilesystemIterator(__DIR__ . '/../Resources/translations');
            $filter = new \RegexIterator($iterator, '/[aA-zZ]+\.([a-z]{2}|[a-z]{2}\_[A-Z]{2})\.yml$/');

            /** @var \SplFileInfo $file */
            foreach ($filter as $file) {
                $resourceName = $file->getBasename('.yml');
                [$fileDomain, $fileLocale] = \explode('.', $resourceName);
                $translator->addResource('yml', $file->getPathname(), $fileLocale, $fileDomain);
            }

            self::$translators[$locale] = $translator;
        }

        return self::$translators[$locale];
    }
}
