<?php

function findFactorialInterative($number) {
    if($number < 0) {
        return null;
    }
    if($number <= 2) {
        return $number;
    }

    $answer = 1;
    for($i = 2; $i <= $number; $i++) {
        $answer *= $i;
    }

    return $answer;
}

var_dump(findFactorialInterative(2)); //2
var_dump(findFactorialInterative(5)); //120
var_dump(findFactorialInterative(6)); //720