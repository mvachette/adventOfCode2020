<?php

namespace MVA\AOC2020;

class Tobogan
{
    private int $trees = 0;
    private array $field;
    private int $positionX;
    private int $positionY;

    public function traverseField(Field $field, array $slope): void
    {
        $this->trees = 0;
        $fieldDepth = $field->getDepth();
        $this->positionX = 0;
        $this->positionY = 0;
        while ($this->positionY < $fieldDepth -1) {
            $this->positionX += $slope[0];
            $this->positionY += $slope[1];

            if (!$field->isPositionClear($this->positionX, $this->positionY)) {
                $this->trees ++;
            }
        }
    }

    public function getEncouteredTrees(): int
    {
        return $this->trees;
    }
}