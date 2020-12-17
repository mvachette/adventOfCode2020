<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/gameConsole.php';

use PHPUnit\Framework\TestCase;

class GameConsoleTest extends TestCase
{
    const PROGRAM = [
        'nop +0',
        'acc +1',
        'jmp +4',
        'acc +3',
        'jmp -3',
        'acc -99',
        'acc +1',
        'jmp -4',
        'acc +6',
    ];

    public function test_boot_sequence_loop()
    {
        $this->assertEquals(['INFINITE_LOOP', 5], runProgram(self::PROGRAM));
    }

    public function test_auto_repair()
    {
        $this->assertEquals(['TERMINATED', 8], repair(self::PROGRAM));
    }
}