<?php

require_once __DIR__ . '/../../src/boardingPass.php';

echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);

echo max(
    ...array_map(
        fn($boardingPass) => \MVA\AOC2020\getSeatId($boardingPass),
        file(__DIR__ . '/input')
    )
);
echo "\n\n" . (microtime(true) - $startTime);


echo "\n\n" . '--- PART 1 ----' . "\n\n";
$startTime = microtime(true);

$seatIds = array_map(
   fn($boardingPass) => \MVA\AOC2020\getSeatId($boardingPass),
   file(__DIR__ . '/input')
);
sort($seatIds);

foreach ($seatIds as $index => $seatId) {
    if ($seatId+1 != $seatIds[$index+1]) {
        echo $seatId+1;
        break;
    }
    /*if ($seatIds[$index-1] === $seatId-1
        && $seatIds[$index+1] !== $seatId+1
    ) {
        echo $seatId+1;
        break;
    }*/
}

echo "\n\n" . (microtime(true) - $startTime);
