<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/Tobogan.php';
require_once __DIR__ . '/../src/Field.php';

use PHPUnit\Framework\TestCase;

class ToboganTest extends TestCase
{
    const FIELD = <<<FIELD
..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#
FIELD;

    public function test_can_get_field_depth()
    {
        // given
        $field = new Field(self::FIELD);
        // then
        $this->assertEquals(11, $field->getDepth());
    }

    public function test_is_position_clear()
    {
        // given
        $field = new Field(self::FIELD);
        // then
        $this->assertTrue($field->isPositionClear(0, 0)); // existing position
        $this->assertFalse($field->isPositionClear(4, 1)); // existing position

        $this->assertTrue($field->isPositionClear(12, 0)); // position on a repeated pattern
        $this->assertFalse($field->isPositionClear(12, 4)); // position on a repeated pattern
    }

    public function test_traverse_field()
    {
        // given
        $field = new Field(self::FIELD);

        $tobogan = new Tobogan();
        $tobogan->traverseField($field, [1, 1]);
        $this->assertEquals(2, $tobogan->getEncouteredTrees());

        $tobogan->traverseField($field, [3, 1]);
        $this->assertEquals(7, $tobogan->getEncouteredTrees());
    }
}