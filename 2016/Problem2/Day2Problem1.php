<?php

require_once(__DIR__ . '/autoloader.php');

use \Turtle\Coordinate;

$m = new \Map\RectangularBoundedMap(
    array(
        array(
            7, 4, 1
        ),
        array(
            8, 5, 2,
        ),
        array(
            9, 6, 3    
        )
    )
);


$mover = new \Map\BoundedPositionMover($m, new Coordinate(1, 1));

$right = new Coordinate(1, 0);
$down = new Coordinate(0, -1);
$up = new Coordinate(0, 1);
$left = new Coordinate(-1, 0);

$directions = array(
    'R' =>  $right,
    'D' => $down,
    'U' => $up,
    'L' => $left
);

$fcon = file_get_contents(__DIR__ . '/input');
$fcon = preg_replace('/[^RDUL\n]/', '', $fcon);
$lines = explode("\n", $fcon);

foreach($lines as $line) {
    $actions = str_split($line);
    foreach($actions as $direction) {
        if(isset($directions[$direction])) {
            $mover->moveBy($directions[$direction]);
        }
    }
    echo $mover->getContents();
}
echo "\n";