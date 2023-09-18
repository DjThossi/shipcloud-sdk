<?php
declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/examples')
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests');

$config = new PhpCsFixer\Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'combine_consecutive_unsets' => true,
        'array_syntax' => array('syntax' => 'short'),
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'php_unit_strict' => false,
        'phpdoc_add_missing_param_annotation' => true,
        'psr_autoloading' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'blank_lines_before_namespace' => ['min_line_breaks' => 2, 'max_line_breaks' => 2],
        'blank_line_after_namespace' => true,
        'phpdoc_align' => false,
        'increment_style' => ['style' => 'post'],
        'phpdoc_order' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_strict_types' => true,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
            'always_move_variable' => false,
        ],
    ))
    ->setFinder($finder)
;