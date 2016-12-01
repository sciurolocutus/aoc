<?php
require_once(dirname(__DIR__) . '/Turtle/Turtle.php');
require_once(dirname(__DIR__) . '/Turtle/MutableDirection.php');

use \Turtle\MutableDirection as MutableDirection;
use \Turtle\Turtle as Turtle;

$x = new Turtle();

echo $x, "\n";

foreach(array('R1', 'R1', 'R1', 'R1') as $direction ) {
    $x->takeAction($direction);
    echo $x, "\n";
}
