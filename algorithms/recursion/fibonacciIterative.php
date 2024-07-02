<?php

// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144 ...

function fibonacciIterative($n) {
    if($n <= 1) {
        return $n;
    }

    $prev = 1;
    $current = 1;

    for($i = 3; $i <= $n; $i++) {
        $temp = $current;
        $current  += $prev;
        $prev = $temp;
    }

    return $current;
}

var_dump(fibonacciIterative(5)); //5
var_dump(fibonacciIterative(6)); //8
var_dump(fibonacciIterative(7)); //13
var_dump(fibonacciIterative(8)); //21