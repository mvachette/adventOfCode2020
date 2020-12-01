<?php
declare(strict_types=1);

namespace MVA\AOC2020\ExpenseReport;

function computeChecksum(array $report): int
{
    foreach ($report as $firstNumber) {
        foreach ($report as $secondNumber) {
            if ($firstNumber + $secondNumber === 2020) {
                return $firstNumber*$secondNumber;
            }
        }
    }

    return 0;
}