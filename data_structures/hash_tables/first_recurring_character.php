<?php

function first_recurring_character(array $input) {
    $len = count($input);
    $i = 0;
    $frc = null;

    while($i < $len) {
        $j = $i + 1;
        while($j < $len) {
            if($input[$i] === $input[$j]) {
                $frc = $input[$j];
                $len = $j;
                break;
            }
            $j++;
        }
        $i++;
    }

    return $frc;
}

function first_recurring_character_better(array $input) {
    $hashTable = [];

    for($i = 0; $i < count($input); $i++) {
        if(in_array($input[$i], $hashTable)) {
            return $input[$i];
        }
        $hashTable[] = $input[$i];
    }

    return null;
}

//It should return 2
echo first_recurring_character([2,5,1,2,3,5,1,2,4]) . "\n";
echo first_recurring_character_better([2,5,1,2,3,5,1,2,4]) . "\n";

//It should return 1
echo first_recurring_character([2,1,1,2,3,5,1,2,4]) . "\n";
echo first_recurring_character_better([2,1,1,2,3,5,1,2,4]) . "\n";

//It should return null
var_dump(first_recurring_character([2,3,4,5]));
var_dump(first_recurring_character_better([2,3,4,5]));

//Bonus... What if we had this:
// return 5 because the pairs are before 2,2
echo first_recurring_character([2,5,5,2,3,5,1,2,4]) . "\n";
echo first_recurring_character_better([2,5,5,2,3,5,1,2,4]) . "\n";