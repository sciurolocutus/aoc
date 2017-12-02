<?php

require_once(__DIR__ . '/autoloader.php');

$testInput = 'abc';
$input = 'input goes here';
$index = 0;

$password = '';

for($i=0; $i<1000000000 && strlen($password) < 8; $i++) {
    $stringToHash = sprintf("%s%d", $input, $index);
    $hash = md5($stringToHash);
    
    //echo $stringToHash, "=>", $hash, "\n";
    
    //echo sprintf("%s:%d => %s\n", $testInput, $index, $hash), "\n";
    if(substr($hash, 0, strlen('00000')) === '00000') {
        $password .= $hash[5];
        echo sprintf("%s:%d => %s\n", $testInput, $index, $hash), "\n";
        echo "Password: " . $password, "\n";
    }
    $index++;
}

echo "Final password: ", $password, "\n";