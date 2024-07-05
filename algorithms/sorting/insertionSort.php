<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function insertionSort(array $array): array {
    $end = $array[0];

    for($i = 1; $i < count($array); $i++) {
        if($array[$i] < $end) {
            $value = array_splice($array, $i, 1)[0];

            for($j = 0; $j < $i; $j++) {
                if($value < $array[$j]) {
                    array_splice($array, $j, 0, $value);
                    break;
                }
            }
        }
        $end = $array[$i];
    }

    return $array;
}

//[0,1,2,4,5,6,44,63,87,99,283]
echo json_encode(insertionSort($numbers)) . "\n";