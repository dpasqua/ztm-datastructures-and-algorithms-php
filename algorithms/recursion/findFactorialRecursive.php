<?php

function findFactorialRecursive($number) {
    if($number < 0) {
        return null;
    }

    if($number <= 2) {
        return $number;
    }
    return $number * findFactorialRecursive($number - 1);
}

var_dump(findFactorialRecursive(2)); //2
var_dump(findFactorialRecursive(5)); //120
var_dump(findFactorialRecursive(6)); //170