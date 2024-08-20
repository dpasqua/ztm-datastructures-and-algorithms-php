<?php

function addTo80($n) {
    echo "long time\n";
    return $n + 80;
}

function memoizedAddTo80() {
    $cache = [];
    return function($n) use (&$cache) {
        if(isset($cache[$n])) {
            return $cache[$n];
        }

        echo "long time\n";
        $result = $n + 80;
        $cache[$n] = $result;
        return $cache[$n];
    };
}

echo "1 - addTo80() - " . addTo80(5) . "\n";
echo "2 - addTo80() - " . addTo80(5) . "\n";
echo "\n";

$memoizedAddTo80 = memoizedAddTo80();
echo "1 - memoizedAddTo80() - " . $memoizedAddTo80(5) . "\n";
echo "2 - memoizedAddTo80() - " . $memoizedAddTo80(5) . "\n";