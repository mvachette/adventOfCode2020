<?php


namespace MVA\AOC2020;

function getSeatPosition(string $boardingPass): array
{
    $row = bindec(str_replace(['B', 'F'], ['1', '0'], substr($boardingPass, 0, 7)));
    $column = bindec(str_replace(['R', 'L'], ['1', '0'], substr($boardingPass, 7, 3)));

    return [$row, $column];
}

function getSeatId(string $boardingPass): int
{
    [$row, $column] = getSeatPosition($boardingPass);

    return $row * 8 + $column;
}