<?php

require_once __DIR__ . '/LinkedList.php';

$myLinkedList = new LinkedList(10);
$myLinkedList->append(5); // 10, 5
$myLinkedList->append(16); //10, 5, 16
$myLinkedList->prepend(1); //1, 10, 5, 16
$myLinkedList->insert(2, 99); //1, 10, 99, 5, 16
$myLinkedList->insert(20, 88); //1, 10, 99, 5, 16, 88

$myLinkedList->remove(2); //1, 10, 5, 16, 88
var_dump(implode(",", $myLinkedList->printList()));
var_dump($myLinkedList->size()); // 5

$myLinkedList->remove(0); //10, 5, 16, 88
var_dump(implode(",", $myLinkedList->printList()));
var_dump($myLinkedList->size()); // 4
