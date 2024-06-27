<?php

// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144,...
function fibonacciRecursive($n) { //O(2^n)
    if($n < 2) {
        return $n;
    }
    return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
}

var_dump(fibonacciRecursive(10)); //55
var_dump(fibonacciRecursive(15)); //610
//var_dump(fibonacciRecursive(43)); //433494437 (too slow)