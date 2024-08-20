<?php

function fibonacciDp($n, &$calculations) {
    $cache = [];
    $closure = function($n) use (&$closure, &$cache, &$calculations) {
        if(isset($cache[$n])) {
            return $cache[$n];
        }

        $calculations++;
        if($n < 2) {
            return $n;
        }

        $result = $closure($n - 1) + $closure($n - 2);
        $cache[$n] = $result;
        return $result;
    };

    return $closure($n);
}

function fibonacci($n, &$calculations) {
    $calculations++;
    if($n < 2) {
        return $n;
    }
    return fibonacci($n - 1, $calculations) + fibonacci($n - 2, $calculations);
}

$input = 15;

$calculations = 0;
$result = fibonacci($input, $calculations);
echo "fibonacci $input == $result, calculations -> $calculations\n";

$calculations = 0;
$result = fibonacciDp($input, $calculations);
echo "fibonacciDp $input == $result, calculations -> $calculations\n";