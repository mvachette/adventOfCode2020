<?php

require_once __DIR__ . '/../../src/passportScanner.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);

echo \MVA\AOC2020\count_valid_passports(
    explode("\r\n\r\n", file_get_contents(__DIR__ . '/input'))
);

echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);

echo \MVA\AOC2020\count_valid_passports_with_rules(
    explode("\r\n\r\n", file_get_contents(__DIR__ . '/input'))
);

echo "\n\n" . (microtime(true) - $startTime);