<?php

//Day 3 problem 1

require_once(__DIR__ . '/autoloader.php');

use \Shape\TriangleSpec;

echo (new TriangleSpec(2, 3, 5))->isValid()?'YAY':'NAY';

$validTriangles = 0;

$fcon = file_get_contents(__DIR__ . '/input');
$lines = explode("\n", $fcon);
foreach($lines as $line) {
    list($junk, $a, $b, $c) = preg_split('/\s+/', $line);
    if((new TriangleSpec($a, $b, $c))->isValid()) {
        $validTriangles++;
    }
    echo "$a, $b, $c\n";
}

echo $validTriangles, "\n";