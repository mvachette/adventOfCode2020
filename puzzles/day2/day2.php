<?php

require_once __DIR__ . '/../../src/passwordValidator.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);
echo count(
    array_filter(
        file(__DIR__ . '/input'),
        fn($passwordDefinition) => \MVA\AOC2020\isPasswordValid($passwordDefinition)
    )
) . "\n\n";
echo microtime(true) - $startTime;

echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);
echo count(
    array_filter(
        file(__DIR__ . '/input'),
        fn($passwordDefinition) => \MVA\AOC2020\isPasswordValidWithPositionalPolicy($passwordDefinition)
    )
) . "\n\n";
echo microtime(true) - $startTime;