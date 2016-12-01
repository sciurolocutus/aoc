<?php

require_once(__DIR__ . '/Turtle/Turtle.php');
require_once(__DIR__ . '/Turtle/MutableDirection.php');

use \Turtle\MutableDirection as MutableDirection;
use \Turtle\Turtle as Turtle;

$x = new Turtle();

echo $x, "\n";

$fcon = file_get_contents(__DIR__ . '/input');
$fcon = preg_replace('/\s+/', '', $fcon);
$actions = explode(',', $fcon);

foreach($actions as $action) {
    $x->takeAction($action);
    echo $x, "\n";
}

echo "Euclidean ('as-the-bird-flies') distance: ", $x->getEuclideanDistance(), "\n";
echo "Cardinal stepping ('as-this-robo-turtle-walks') distance: ", $x->getCardinalStepdistance(), "\n";
