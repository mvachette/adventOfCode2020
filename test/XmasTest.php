<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/xmas.php';

use PHPUnit\Framework\TestCase;

class GameConsoleTest extends TestCase
{
    const DATA = [
        35,
        20,
        15,
        25,
        47,
        40,
        62,
        55,
        65,
        95,
        102,
        117,
        150,
        182,
        127,
        219,
        299,
        277,
        309,
        576,
    ];

    public function test_detect_first_wrong_number()
    {
        $this->assertEquals(127, findWrongNumber(self::DATA, 5));
    }

    public function test_detect_weakness_sequence()
    {
        $this->assertEquals([15, 25, 47, 40], detectWeaknessSequence(self::DATA, 5, 127));
    }

    public function test_find_weakness()
    {
        $this->assertEquals(62, findWeakness(self::DATA, 5));
    }

}