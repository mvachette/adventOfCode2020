<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/declarationForm.php';

use PHPUnit\Framework\TestCase;

class PassportScannerTest extends TestCase
{
    const INPUT = <<<INPUT
abc

a
b
c

ab
ac

a
a
a
a

b
INPUT;

    public function test_count_number_of_yes_answers_for_anyone()
    {
        $this->assertEquals(11, countYesAnswersForAnyOne(self::INPUT));
    }

    public function test_count_number_of_yes_answers_for_everyone()
    {
        $this->assertEquals(6, countYesAnswersForEveryone(self::INPUT));
    }
}