<?php

require_once(__DIR__ . '/autoloader.php');

use \Turtle\Coordinate;

/*
$mapContents = <<<"EOT"
##1##
#234#
56789
#ABC#
##D##
EOT;
*/

$mapContents = <<<"EOT"
##5##
#26A#
137BD
#48C#
##9##
EOT;


$mapLines = explode("\n", $mapContents);
$map = array();
//$mapLines = array_reverse($mapLines);
foreach($mapLines as $ln) {
    $map[] = array_reverse(str_split($ln));
}
$map = ($map);

$m = new \Map\RectangularBoundedMapWithWalls($map);
$mover = new \Map\BoundedPositionMover($m, new Coordinate(0, 2));


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
            //echo join(':', array($direction, $mover->getCoordinates(), $mover->getContents())), "\n";
        }
    }
    echo $mover->getContents();
}
echo "\n";