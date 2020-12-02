<?php

require_once __DIR__ . '/../../src/passwordValidator.php';

echo '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);
echo count(
    array_filter(
        file(__DIR__ . '/input1'),
        fn($passwordDefinition) => \MVA\AOC2020\isPasswordValid($passwordDefinition)
    )
) . "\n\n";
echo microtime(true) - $startTime;