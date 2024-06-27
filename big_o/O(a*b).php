<?php

function compressBoxesTwice(array $boxes, array $boxes2) {
    foreach($boxes as $box1) {
        foreach($boxes2 as $box2) {
            echo "$box1 $box2\n";
        }
    }
}

// O(a*b)
compressBoxesTwice([1, 2, 3, 4, 5], [6, 7]);