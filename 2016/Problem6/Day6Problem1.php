<?php

require_once(__DIR__ . '/transpose.php');
require_once(__DIR__ . '/autoloader.php');

use \Checksum\RoomSpec;

$fcon = file_get_contents(__DIR__ . '/input');
//$fcon = file_get_contents(__DIR__ . '/testinput');
$lines = explode("\n", $fcon);
$characterGrid = array_map(str_split, $lines);

$transposedLines = transpose($characterGrid);
//var_export($transposedLines);

$answer = '';

foreach($transposedLines as $column) {
    $mostCommonLetters = RoomSpec::findNMostCommonLetters(implode('', $column), 1);
    
    $answer .= implode('', array_map(function($a) { return $a['letter']; }, $mostCommonLetters));
}

echo $answer, "\n";