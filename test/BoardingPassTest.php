<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/boardingPass.php';

use PHPUnit\Framework\TestCase;

class BoardingPassTest extends TestCase
{
    public function test_get_position()
    {
        $this->assertEquals([70, 7], getSeatPosition('BFFFBBFRRR'));
        $this->assertEquals([14, 7], getSeatPosition('FFFBBBFRRR'));
        $this->assertEquals([102, 4], getSeatPosition('BBFFBBFRLL'));
    }

    public function test_get_seatId()
    {
        $this->assertEquals(567, getSeatId('BFFFBBFRRR'));
        $this->assertEquals(119, getSeatId('FFFBBBFRRR'));
        $this->assertEquals(820, getSeatId('BBFFBBFRLL'));
    }
}