<?php

require_once(__DIR__ . '/autoloader.php');

$testInput = 'abc';
$input = 'input goes here';

$index = 0;

$password = '';
$passwordArr = array();

for($i=0; $i<1000000000 && count($passwordArr) < 8; $i++) {
    $stringToHash = sprintf("%s%d", $input, $index);
    $hash = md5($stringToHash);
    
    if(substr($hash, 0, strlen('00000')) === '00000'
        && is_numeric($hash[5]) && intval($hash[5], 10) < 8
        && !isset($passwordArr[$hash[5]])
        ) {
        $passwordArr[$hash[5]] .= $hash[6];
        echo sprintf("%s:%d => %s\n", $input, $index, $hash), "\n";
        echo "Password: " . var_export($passwordArr, true), "\n";
    }
    $index++;
}

echo "Final password: ", var_export($passwordArr, true), "\n";
ksort($passwordArr);
echo "Otherwise stated: ", implode('', $passwordArr), "\n";