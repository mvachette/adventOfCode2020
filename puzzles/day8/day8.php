<?php

require_once __DIR__ . '/../../src/gameConsole.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);


var_dump(\MVA\AOC2020\runProgram(file(__DIR__ . '/input')));

echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);

var_dump( \MVA\AOC2020\repair(file(__DIR__ . '/input')));

echo "\n\n" . (microtime(true) - $startTime);
