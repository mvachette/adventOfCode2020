<?php

require_once __DIR__ . '/../../src/declarationForm.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);

echo \MVA\AOC2020\countYesAnswersForAnyOne(file_get_contents(__DIR__ . '/input'));

echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);

echo \MVA\AOC2020\countYesAnswersForEveryone(file_get_contents(__DIR__ . '/input'));

echo "\n\n" . (microtime(true) - $startTime);
