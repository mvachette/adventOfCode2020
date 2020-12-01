<?php

require_once __DIR__ . '/../../src/expenseReport.php';

$startTime = microtime(true);
echo \MVA\AOC2020\ExpenseReport\computeChecksum(
    array_map('intval', file(__DIR__ . '/input1.txt'))
) . "\n\n";
echo microtime(true) - $startTime;

// first suboptimal solution 0.0026071071624756
// optimized algo with sorting 0.00068783760070801


