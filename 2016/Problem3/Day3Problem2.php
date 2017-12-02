<?php

//Day 3 problem 1

require_once(__DIR__ . '/autoloader.php');

use \Shape\TriangleSpec;

$validTriangles = 0;

$fcon = file_get_contents(__DIR__ . '/input');
$lines = explode("\n", $fcon);
$cols = array();
//transpose the input
foreach($lines as $line) {
    list($junk, $a, $b, $c) = preg_split('/\s+/', $line);
    $cols[0] []= $a;
    $cols[1] []= $b;
    $cols[2] []= $c;
}

foreach($cols as $column) {
    for($i=0; $i<count($column); $i+=3) {
        echo join(':', array_slice($column, $i, 3)), "\n";
        if((new TriangleSpec($column[$i], $column[$i+1], $column[$i+2]))->isValid()) {
            $validTriangles++;
        }
    }
}

echo $validTriangles, "\n";