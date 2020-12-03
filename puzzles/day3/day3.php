<?php

require_once __DIR__ . '/../../src/Tobogan.php';
require_once __DIR__ . '/../../src/Field.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);
$field = new \MVA\AOC2020\Field(file_get_contents(__DIR__ . '/input'));
$tobogan = new \MVA\AOC2020\Tobogan();

$tobogan->traverseField($field, [3, 1]);
echo $tobogan->getEncouteredTrees();
echo "\n\n" . (microtime(true) - $startTime);

echo "\n\n" . '--- PART 2 ----' . "\n\n";
$startTime = microtime(true);
$field = new \MVA\AOC2020\Field(file_get_contents(__DIR__ . '/input'));
$tobogan = new \MVA\AOC2020\Tobogan();

$slopes = [
    [1, 1], [3, 1], [5, 1], [7, 1], [1, 2]
];

$trees = [];
foreach ($slopes as $slope) {
    $tobogan->traverseField($field, $slope);
    $trees[] = $tobogan->getEncouteredTrees();
}

var_dump($trees);
echo array_reduce(
    $trees,
    fn ($product, $treesForSlope) => $product*$treesForSlope,
    1
);


echo "\n\n" . (microtime(true) - $startTime);