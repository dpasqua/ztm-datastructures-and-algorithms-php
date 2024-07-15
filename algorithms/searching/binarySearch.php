<?php

function binarySearch(array $array, $key): bool {

    if(count($array) == 1) {
        return $key == $array[0];
    }

    if($key < $array[0]) {
        return false;
    }

    if($key > $array[count($array) - 1]) {
        return false;
    }

    $middleKey = floor(count($array) / 2);
    $middle = $array[$middleKey];

    if($key == $middle) {
        return true;
    }
    else if($key < $middle) {
        return binarySearch(array_slice($array, 0, $middleKey), $key);
    }
    else if($key > $middle) {
        return binarySearch(array_slice($array, $middleKey), $key);
    }
}

//make sure the array is sorted
$array = [8, 24, 33, 40, 44, 58, 78, 86, 87, 88];
echo 44 . " -> " . (binarySearch($array, 44) ? "true" : "false"). "\n"; //true
echo 24 . " -> " . (binarySearch($array, 24) ? "true" : "false"). "\n"; //true
echo 86 . " -> " . (binarySearch($array, 86) ? "true" : "false"). "\n"; //true
echo 79 . " -> " . (binarySearch($array, 79) ? "true" : "false"). "\n"; //false
echo 90 . " -> " . (binarySearch($array, 90) ? "true" : "false"). "\n"; //false