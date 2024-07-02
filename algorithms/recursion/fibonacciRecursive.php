<?php

// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144 ...

function fibonacciRecursive($n) {
    if($n <= 1) {
        return $n;
    }

    return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
}

var_dump(fibonacciRecursive(5)); //5
var_dump(fibonacciRecursive(6)); //8
var_dump(fibonacciRecursive(7)); //13
var_dump(fibonacciRecursive(8)); //21