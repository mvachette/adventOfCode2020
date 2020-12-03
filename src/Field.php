<?php

namespace MVA\AOC2020;

class Field
{
    private array $field;
    private int $depth;
    private int $patternWidth;

    public function __construct(string $fieldPattern)
    {
        $this->field = array_map('array_filter', array_map(
            'str_split',
            explode("\r\n", $fieldPattern)
        ));
        $this->depth = count($this->field);
        $this->patternWidth = count(current($this->field));
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function isPositionClear(int $x, int $y): bool
    {
        $xOnPattern = $x > ($this->patternWidth) ? $x % $this->patternWidth : $x;
        return $this->field[$y][$xOnPattern] === '.';
    }
}