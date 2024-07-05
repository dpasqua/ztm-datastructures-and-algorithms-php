<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function selectionSort(array $array): array { // O(n^2)
    $smallest = 0;

    for($i = 0; $i < count($array); $i++) {
        for($j = $i+1; $j < count($array); $j++) {
            if($array[$j] < $array[$smallest]) {
                $smallest = $j;
            }
        }

        $temp = $array[$i];
        $array[$i] = $array[$smallest];
        $array[$smallest] = $temp;
    }

    return $array;
}

//[0,1,2,4,5,6,44,63,87,99,283]
echo json_encode(selectionSort($numbers)) . PHP_EOL;