<?php

function reverseString($str) {
    $arr = str_split($str);
    $newStr = '';

    for($i = count($arr) - 1; $i >= 0; $i--) {
        $newStr .= $arr[$i];
    }

    return $newStr;
}

var_dump(reverseString("yoyo master")); //retsam oyoy