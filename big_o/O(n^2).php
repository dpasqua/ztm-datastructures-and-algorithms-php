<?php

$boxes = [1,2,3,4,5];

function logAllPairsOfArray(array $array) {
    for($i = 0; $i < count($array); $i++) {
        for($j = 0; $j < count($array); $j++) {
            echo "{$array[$i]} {$array[$j]}\n";
        }
    }
}

// O(n*n) == O(n^2)
logAllPairsOfArray($boxes);