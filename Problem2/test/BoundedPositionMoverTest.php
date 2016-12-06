<?php

namespace Map;

require_once(dirname(__DIR__) . '/autoloader.php');

use \Turtle\Coordinate;

$m = new \Map\RectangularBoundedMap(
    array(
        array(
            1, 2, 3
        ),
        array(
            4, 5, 6,
        ),
        array(
            7, 8, 9    
        ),
        array(
            10, 11, 12
        )
    )
);

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

echo $mover->getContents(), "\n";
for($i=0; $i<3; $i++) {
    echo $mover->moveBy($right)?"SUCCESS":"FAILURE", "\n";
    echo $mover->getCoordinates(), "\n";
    echo $mover->getContents(), "\n";
}
for($i=0; $i<3; $i++) {
    echo $mover->moveBy($up)?"SUCCESS":"FAILURE", "\n";
    echo $mover->getCoordinates(), "\n";
    echo $mover->getContents(), "\n";
}