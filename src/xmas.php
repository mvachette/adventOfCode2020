<?php

namespace MVA\AOC2020;

function findWrongNumber(array $data, $preambleLength): int
{
    $dataLength = count($data);
    for ($testedNumberIndex = $preambleLength; $testedNumberIndex < $dataLength; $testedNumberIndex++) {
        $testedInterval = array_slice(
            $data,
            $testedNumberIndex - $preambleLength,
            $preambleLength
        );
        $testedNumber = $data[$testedNumberIndex];
        $pairFound = false;
        foreach ($testedInterval as $firstPairNumber) {
            $secondPairNumberIndex = array_search($testedNumber - $firstPairNumber, $testedInterval);
            if ($secondPairNumberIndex === false) {
                continue;
            }
            $secondPairNumber = $testedInterval[$secondPairNumberIndex];
            if ($secondPairNumberIndex !== $firstPairNumber) {
                $pairFound = true;
            }
        }
        if (!$pairFound) {
            return $testedNumber;
        }
    }
}

function detectWeaknessSequence(array $data, int $preambleLength, int $wrongNumber)
{
    $potentialSequences = [];
    foreach ($data as $iterator => $number) {
        $potentialSequences[] = [];
        foreach ($potentialSequences as $sequenceIterator => &$sequence) {
            array_push($sequence, $number);
            $sequenceSum = array_sum($sequence);
            if ($sequenceSum === $wrongNumber) {
                return $sequence;
            }
            if ($sequenceSum > $wrongNumber) {
                unset($potentialSequences[$sequenceIterator]);
            }
        }
    }
    return [];
}

function findWeakness(array $data, int $preambleLength) {
    $wrongNumber = findWrongNumber($data, $preambleLength);
    $weaknessSequence = detectWeaknessSequence($data, $preambleLength, $wrongNumber);
    return min($weaknessSequence) + max($weaknessSequence);
}