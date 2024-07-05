<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

//O(n^2)
function bubbleSort(array $array): array {
    $counter  = 0;

    while($counter < count($array)) {
        $i = 0;
        $j = 1;

        while($j < count($array)) {
            if($array[$i] > $array[$j]) {
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
            $j++;
            $i++;
        }
        $counter++;
    }

    return $array;
}

//[0,1,2,4,5,6,44,63,87,99,283]
echo json_encode(bubbleSort($numbers)) . PHP_EOL;