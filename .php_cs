<?php
return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'declare_strict_types' => true,
        'array_syntax' => ['syntax' => 'short'],
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