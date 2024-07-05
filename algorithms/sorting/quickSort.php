<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function quickSort(array &$array, $left, $right) {
    if($left < $right) {
        $pivot = $right;
        $partitionindex = partition($array, $pivot, $left, $right);

        quickSort($array, $left, $partitionindex - 1);
        quickSort($array, $partitionindex + 1, $right);
    }
}

function partition(array &$array, $pivot, $left, $right) {
    $pivotvalue = $array[$pivot];
    $partitionindex = $left;

    for($i = $left; $i < $right; $i++) {
        if($array[$i] < $pivotvalue) {
            swap($array, $i, $partitionindex);
            $partitionindex++;
        }
    }

    swap($array, $right, $partitionindex);
    return $partitionindex;
}

function swap(array &$array, $firstIndex, $secondIndex) {
    $temp = $array[$firstIndex];
    $array[$firstIndex] = $array[$secondIndex];
    $array[$secondIndex] = $temp;
}

//Select first and last index as 2nd and 3rd parameters
quickSort($numbers, 0, count($numbers) - 1);
echo json_encode($numbers) . "\n";