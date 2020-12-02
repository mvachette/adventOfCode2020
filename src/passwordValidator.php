<?php
declare(strict_types=1);

namespace MVA\AOC2020;

function isPasswordValid(string $passwordDefinition): bool
{
    [$lowerBound, $upperBound, $requiredLetter, $password] = sscanf(
        $passwordDefinition,
        '%d-%d %1s: %s'
    );

    $numberOfRequiredLetter = substr_count($password, $requiredLetter);

    return $lowerBound <= $numberOfRequiredLetter
        && $numberOfRequiredLetter <= $upperBound;
}

function isPasswordValidWithPositionalPolicy(string $passwordDefinition): bool
{
    [$firstPosition, $secondPosition, $requiredLetter, $password] = sscanf(
        $passwordDefinition,
        '%d-%d %1s: %s'
    );

    return $password[$firstPosition-1] === $requiredLetter
        xor $password[$secondPosition-1] === $requiredLetter;
}