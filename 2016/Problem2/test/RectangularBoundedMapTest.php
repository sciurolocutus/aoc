<?php

namespace Map;

require_once(dirname(__DIR__) . '/autoloader.php');

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

echo var_export($m, true), "\n";

for($x=0; $x<5; $x++) {
    for($y=0; $y<3; $y++) {
        echo $m->getContents(new \Turtle\Coordinate($x, $y));
    }
    echo "\n";
}