<?php

function transpose($arr) {
    array_unshift($arr, null);
    $arr = call_user_func_array('array_map', $arr);
    return $arr;
}

function test_transpose() {
    $array = array(
        array(1, 2),
        array(3, 4),
        array(5, 6)
    );
    
    echo (transpose(transpose($array)) == $array) ? 'YAY' : 'NAY', "\n";

    echo var_export($array, true), "\n";
    echo var_export(transpose($array), true), "\n";
    echo var_export(transpose(transpose($array)), true), "\n";
    echo var_export(transpose(transpose(transpose($array))), true), "\n";
}