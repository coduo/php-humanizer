<?php

namespace Coduo\PHPHumanizer\Translator;

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;

final class Builder
{
    /**
     * @param $locale
     * @return Translator
     */
    public static function build($locale)
    {
        $translator = new Translator($locale);
        $translator->addLoader('yml', new YamlFileLoader());

        $iterator = new \FilesystemIterator(__DIR__.'/../Resources/translations');
        $filter = new \RegexIterator($iterator, '/[aA-zZ]+\.([a-z]{2}|[a-z]{2}\_[A-Z]{2})\.yml$/');

        foreach ($filter as $file) {
            /* @var $file \SplFileInfo */
            $resourceName = $file->getBasename('.yml');
            list($fileDomain, $fileLocale) = explode('.', $resourceName);
            $translator->addResource('yml', $file->getPathname(), $fileLocale, $fileDomain);
        }

        return $translator;
    }
}
