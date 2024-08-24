<?php

$boxes = [0,1,2,3,4,5];

function logFirstTwoBoxes(array $boxes) {
    echo $boxes[0] . "\n"; // O(1)
    echo $boxes[1] . "\n"; // O(1)
}

//O(1) - Constant Time
logFirstTwoBoxes($boxes);

