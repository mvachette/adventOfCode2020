<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/bags.php';

use PHPUnit\Framework\TestCase;

class BoardingPassTest extends TestCase
{
    private const RULES = [
        'light red bags contain 1 bright white bag, 2 muted yellow bags.',
        'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
        'bright white bags contain 1 shiny gold bag.',
        'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
        'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
        'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
        'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
        'faded blue bags contain no other bags.',
        'dotted black bags contain no other bags.',
    ];

    public function test_parse_rule()
    {
        $this->assertEquals(
            ['light red', ['bright white', 'muted yellow', 'muted yellow']],
            parseRule('light red bags contain 1 bright white bag, 2 muted yellow bags.')
        );
    }

    public function test_count_containers()
    {
        $this->assertEquals(4, count_containers('shiny gold', self::RULES));
    }

    public function test_count_all_bags()
    {
        $this->assertEquals(32, count_all_bags('shiny gold', self::RULES));
    }
}