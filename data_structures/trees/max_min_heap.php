<?php

$maxHeap = new \SplMaxHeap();
$minHeap = new \SplMinHeap();

$numbers = [5, 12, 3, 8, 21, 1, 17];
foreach ($numbers as $number) {
    $maxHeap->insert($number);
    $minHeap->insert($number);
}

/** maxHeap */
var_dump($maxHeap->extract()); //21
var_dump($maxHeap->extract()); //17
var_dump($maxHeap->extract()); //12
var_dump($maxHeap->extract()); //8
var_dump($maxHeap->extract()); //5
var_dump($maxHeap->extract()); //3
var_dump($maxHeap->extract()); //1
var_dump($maxHeap->isEmpty()); //true

/** minHeap */
var_dump($minHeap->extract()); //1
var_dump($minHeap->extract()); //3
var_dump($minHeap->extract()); //5
var_dump($minHeap->extract()); //8
var_dump($minHeap->extract()); //12
var_dump($minHeap->extract()); //17
var_dump($minHeap->extract()); //21
var_dump($minHeap->isEmpty()); //true
