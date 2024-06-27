<?php
// Space complexity O(n)
function arrayOfHiNTimes(int $n) {
    $hiArray = [];
    for ($i = 0; $i < $n; $i++) {
        $hiArray[$i] = "hi";
    }
  return $hiArray;
}

var_dump(arrayOfHiNTimes(6)); // O(n)