<?php

$nemo = ['nemo'];
$everyone = ['dory', 'bruce', 'marlin', 'nemo', 'gill', 'bloat', 'nigel', 'squirt', 'darla', 'hank'];

function findNemo(array $array) {
    for($i = 0; $i < count($array); $i++) {
        if($array[$i] === 'nemo') { // O(n)
            echo "Found Nemo!\n";
        }
    }
}

// O(n) --> Linear Time
findNemo($nemo);
findNemo($everyone);
