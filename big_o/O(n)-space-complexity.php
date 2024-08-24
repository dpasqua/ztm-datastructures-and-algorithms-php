<?php
// Space complexity O(n)
function arrayOfHiNTimes(int $n) {
    $hiArray = [];
    for ($i = 0; $i < $n; $i++) {
        $hiArray[$i] = "hi";
    }
  return $hiArray;
}

// ["hi","hi","hi","hi","hi","hi"]
echo json_encode(arrayOfHiNTimes(6)) . "\n"; // O(n)