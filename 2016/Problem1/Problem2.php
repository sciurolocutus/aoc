<?php

require_once(__DIR__ . '/Turtle/Coordinate.php');
require_once(__DIR__ . '/Turtle/Turtle.php');
require_once(__DIR__ . '/Turtle/PenTurtle.php');
require_once(__DIR__ . '/Turtle/MutableDirection.php');

use \Turtle\MutableDirection as MutableDirection;
use \Turtle\Turtle as Turtle;
use \Turtle\PenTurtle as PenTurtle;

$visited = array();
$doubleVisitCount = 0;

$x = new PenTurtle(function($coord) use (&$visited, &$doubleVisitCount) {
    //echo "WOOOP\n";
    if(isset($visited[$coord->__toString()])) {
        $visited[$coord->__toString()]++;
        $doubleVisitCount++;
        echo "Visited $coord again\n";
    } else {
        $visited[$coord->__toString()] = 1;
    }
    
    if($doubleVisitCount == 1) {
        echo "First double-visit: $coord\n";
        echo "Euclidean ('as-the-bird-flies') distance: ", $coord->getEuclideanDistance(), "\n";
        echo "Cardinal stepping ('as-this-robo-turtle-walks') distance: ", $coord->getCardinalStepdistance(), "\n";
        echo var_export(array_filter($visited, function($v) { return $v > 1; }), true), "\n";
        exit(0);
    }
    //echo var_export($visited, true), "\n";
});

echo $x, "\n";

$fcon = file_get_contents(__DIR__ . '/input');
$fcon = preg_replace('/\s+/', '', $fcon);
$actions = explode(',', $fcon);

foreach($actions as $action) {
    $x->takeAction($action);
    //echo $x, "\n";
}
//echo var_export($visited, true), "\n";

echo "Euclidean ('as-the-bird-flies') distance: ", $x->getEuclideanDistance(), "\n";
echo "Cardinal stepping ('as-this-robo-turtle-walks') distance: ", $x->getCardinalStepdistance(), "\n";
