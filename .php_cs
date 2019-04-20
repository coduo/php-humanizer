<?php

$fileHeaderComment = <<<COMMENT
This file is part of the PHP Humanizer Library.

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
COMMENT;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'declare_strict_types' => true,
        'array_syntax' => ['syntax' => 'short'],
        'header_comment' => ['header' => $fileHeaderComment, 'separate' => 'both'],
        'blank_line_after_opening_tag' => true,
        'single_blank_line_before_namespace' => true,
        'no_unused_imports' => true,
        'single_quote' => true,
        'native_function_invocation' => true
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
    )->setRiskyAllowed(true)
    ->setUsingCache(false);