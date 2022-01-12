<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
        'concat_space' => ['spacing' => 'one'],
        'ordered_imports' => true,
        'random_api_migration' => true,
        'phpdoc_summary' => false,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder)
;
