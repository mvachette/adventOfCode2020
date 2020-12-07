<?php
declare(strict_types=1);

namespace MVA\AOC2020;

function countYesAnswersForAnyOne(string $formResults): int
{
    return array_sum(
        array_map(
            fn($groupResults) => count(array_unique(str_split(str_replace("\r\n", '', $groupResults)))),
            explode("\r\n\r\n", $formResults)
        )
    );
}

function countYesAnswersForEveryone(string $formResults): int
{
    return array_sum(
        array_map(
            function($groupResults) {
                $peopleAnswers = array_map('str_split', explode("\r\n", $groupResults));
                $commonAnswers = count($peopleAnswers) == 1
                    ? current($peopleAnswers)
                    : call_user_func_array('array_intersect', $peopleAnswers);
                 return count(array_unique($commonAnswers));
            },
            explode("\r\n\r\n", $formResults)
        )
    );
}

