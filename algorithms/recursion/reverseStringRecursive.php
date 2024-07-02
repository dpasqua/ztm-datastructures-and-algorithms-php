<?php

function reverseStringRecursive($str) {
    if(strlen($str) == 1) {
        return $str;
    }

    return reverseStringRecursive(substr($str, 1)) . substr($str, 0, 1);
}

var_dump(reverseStringRecursive("yoyo master"));