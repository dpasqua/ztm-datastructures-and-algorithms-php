<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function mergeSort(array $array): array {
    if(count($array) == 1) {
        return $array;
    }

    $middle = round(count($array) / 2);
    $left = array_slice($array, 0, $middle);
    $right = array_slice($array, $middle);

    return merge(
        mergeSort($left),
        mergeSort($right)
    );
}

function merge(array $left, array $right): array {
    $i = 0;
    $j = 0;
    $sorted = [];

    while($i < count($left) && $j < count($right)) {
        if($left[$i] < $right[$j]) {
            $sorted[] = $left[$i];
            $i++;
        } else {
            $sorted[] = $right[$j];
            $j++;
        }
    }

    while($i < count($left)) {
        $sorted[] = $left[$i];
        $i++;
    }
    while($j < count($right)) {
        $sorted[] = $right[$j];
        $j++;
    }

    return $sorted;
}

//[0,1,2,4,5,6,44,63,87,99,283]
echo json_encode(mergeSort($numbers)) . "\n";