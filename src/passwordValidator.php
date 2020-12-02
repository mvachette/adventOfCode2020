<?php
declare(strict_types=1);

namespace MVA\AOC2020;

function isPasswordValid(string $passwordDefinition): bool
{
    [$lowerBound, $upperBound, $requiredLetter, $password] = sscanf(
        $passwordDefinition,
        '%d-%d %s %s'
    );

    $numberOfRequiredLetter = substr_count($password, trim($requiredLetter, ':'));

    return $lowerBound <= $numberOfRequiredLetter
        && $numberOfRequiredLetter <= $upperBound;
}