<?php

require_once __DIR__ . '/../../src/xmas.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);


var_dump(\MVA\AOC2020\findWrongNumber(array_map('trim', file(__DIR__ . '/input')), 25));

echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);

var_dump(\MVA\AOC2020\findWeakness(array_map('trim', file(__DIR__ . '/input')), 25));

echo "\n\n" . (microtime(true) - $startTime);
