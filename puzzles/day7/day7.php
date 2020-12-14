<?php

require_once __DIR__ . '/../../src/bags.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);


echo \MVA\AOC2020\count_containers('shiny gold', file(__DIR__ . '/input'));

echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);

echo \MVA\AOC2020\count_all_bags('shiny gold', file(__DIR__ . '/input'));

echo "\n\n" . (microtime(true) - $startTime);
