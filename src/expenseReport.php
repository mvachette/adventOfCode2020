<?php
declare(strict_types=1);

namespace MVA\AOC2020\ExpenseReport;

function computeChecksum(array $report): int
{
    sort($report);
    $reportLength = count($report);
    for ($firstNumberIndex = 0; $firstNumberIndex < $reportLength-1; $firstNumberIndex++) {
        $firstNumber = $report[$firstNumberIndex];
        for ($secondNumberIndex = $reportLength-1; $secondNumberIndex > 0; $secondNumberIndex--) {
            $secondNumber = $report[$secondNumberIndex];
            if ($firstNumber + $secondNumber === 2020) {
                return $firstNumber*$secondNumber;
            }
        }
    }

    return 0;
}

function computeChecksum3(array $report): int
{
    sort($report);
    $reportLength = count($report);
    for ($firstNumberIndex = 0; $firstNumberIndex < $reportLength-1; $firstNumberIndex++) {
        $firstNumber = $report[$firstNumberIndex];
        for ($secondNumberIndex = $reportLength-1; $secondNumberIndex > 0; $secondNumberIndex--) {
            $secondNumber = $report[$secondNumberIndex];
            if ($firstNumber + $secondNumber >= 2020) {
                continue;
            }
            for ($thirdNumberIndex = $reportLength-1; $thirdNumberIndex > 0; $thirdNumberIndex--) {
                $thirdNumber = $report[$thirdNumberIndex];
                if ($firstNumber + $secondNumber + $thirdNumber === 2020) {
                    return $firstNumber * $secondNumber * $thirdNumber;
                }
            }
        }
    }

    return 0;
}