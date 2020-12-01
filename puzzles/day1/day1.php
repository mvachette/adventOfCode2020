<?php

require_once __DIR__ . '/../../src/expenseReport.php';

echo \MVA\AOC2020\ExpenseReport\computeChecksum(
    array_map('intval', file(__DIR__ . '/input1.txt'))
);