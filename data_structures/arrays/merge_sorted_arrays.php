<?php

function merge_sorted_arrays(array $arr1, array $arr2): array {
    $mergedArray = [];
    $i = 0;
    $j = 0;

    while($i < count($arr1) && $j < count($arr2)) {
        if($arr1[$i] < $arr2[$j]) {
            $mergedArray[] = $arr1[$i];
            $i++;
        } else {
            $mergedArray[] = $arr2[$j];
            $j++;
        }
    }

    while($i < count($arr1)) {
        $mergedArray[] = $arr1[$i];
        $i++;
    }

    while($j < count($arr2)) {
        $mergedArray[] = $arr2[$j];
        $j++;
    }

    return $mergedArray;
}

$arr = merge_sorted_arrays([0,3,4,31], [3,4,6,30]);
echo json_encode($arr) . "\n";

//[0,3,3,4,4,6,30,31]