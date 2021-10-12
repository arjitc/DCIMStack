<?php

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'binary_operator_spaces' => ['operators' => ['=' => 'align_single_space', '=>' => 'align_single_space']],
        'strict_param' => false,
        'braces' => [
            'allow_single_line_closure' => true,
            'position_after_functions_and_oop_constructs' => 'same'],
    ]);
