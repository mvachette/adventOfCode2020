<?php
declare(strict_types=1);

namespace MVA\AOC2020;

function count_valid_passports(array $passports): int
{
    $requiredFields = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid', 'cid'];
    return array_reduce(
        $passports,
        function ($numberOfValidPassports, $passport) use ($requiredFields) {
            $fields = array_map(
                fn($row) => explode(':', $row)[0],
                explode(' ', str_replace("\r\n", ' ', $passport))
            );

            if (array_diff($requiredFields, $fields) === []
                || array_values(array_diff($requiredFields, $fields)) === ['cid']
            ) {
                 $numberOfValidPassports++;
            }
            return $numberOfValidPassports;
        },
        0
    );
}

function count_valid_passports_with_rules(array $passports): int
{
    $requiredFields = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid', 'cid'];
    return array_reduce(
        $passports,
        function ($numberOfValidPassports, $passport) use ($requiredFields) {
            $rawFields = explode(' ', str_replace("\r\n", ' ', $passport));
            $fields = array_combine(
                array_map(fn($row) => explode(':', $row)[0], $rawFields),
                array_map(fn($row) => explode(':', $row)[1], $rawFields),
            );

            $missingFields = array_values(array_diff($requiredFields, array_keys($fields)));
            if ([] !== $missingFields && ['cid'] !== $missingFields) {
                return $numberOfValidPassports;
            }

            foreach ($fields as $field => $value) {
                if (!isFieldValid($field, $value)) {
                    return $numberOfValidPassports;
                }
            }

            return ++$numberOfValidPassports;
        },
        0
    );
}

function isFieldValid($field, $value):bool
{
    switch ($field) {
        case 'byr':
            // (Birth Year) - four digits; at least 1920 and at most 2002.
            return 4 === strlen($value)
                && (int) $value >= 1920
                && (int) $value <= 2002;
        case 'iyr':
            // (Issue Year) - four digits; at least 2010 and at most 2020.
            return 4 === strlen($value)
                && (int) $value >= 2010
                && (int) $value <= 2020;
        case 'eyr':
            // (Expiration Year) - four digits; at least 2020 and at most 2030.
            return 4 === strlen($value)
                && (int) $value >= 2020
                && (int) $value <= 2030;
        case 'hgt':
             // (Height) - a number followed by either cm or in:
             // If cm, the number must be at least 150 and at most 193.
             // If in, the number must be at least 59 and at most 76.
             return (bool) preg_match('#^(\d+)cm$#', $value, $cmMatches) && (int) $cmMatches[1] >= 150 && (int) $cmMatches[1] <= 193
                || (bool) preg_match('#^(\d+)in$#', $value, $inMatches) && (int) $inMatches[1] >= 59 && (int) $inMatches[1] <= 76;
        case 'hcl':
            // (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
            return (bool )preg_match('/^#[0-9a-f]{6}$/', $value);
        case 'ecl':
            // (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
            return in_array($value, ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth']);
        case 'pid':
            // (Passport ID) - a nine-digit number, including leading zeroes.
            return (bool) preg_match('/^\d{9}$/', $value);
        case 'cid':
            // (Country ID) - ignored, missing or not.
            return true;
        default:
            return false;
    }
}