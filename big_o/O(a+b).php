<?php

function compressBoxesTwice(array $boxes, array $boxes2) {
    foreach($boxes as $box) {
        echo "$box\n";
    }
    foreach($boxes2 as $box) {
        echo "$box\n";
    }
}

// O(a+b)
compressBoxesTwice([1, 2, 3, 4, 5], [6, 7]);


