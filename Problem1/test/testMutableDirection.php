<?php
require_once(dirname(__DIR__) . '/Turtle/MutableDirection.php');

use \Turtle\MutableDirection as MutableDirection;

function testMutableDirection() {
    $x = new MutableDirection('N');

    echo $x, "\n";

    for($i=0; $i<4; $i++) {
        $x->rotate('R');
        echo $x, "\n";
    }

    for($i=0; $i<4; $i++) {
        $x->rotate('L');
        echo $x, "\n";
    }


    for($i=0; $i<4; $i++) {
        $x->rotate('L');
        echo $x, "\n";
        $x->rotate('R');
        echo $x, "\n";
    }
}

testMutableDirection();
