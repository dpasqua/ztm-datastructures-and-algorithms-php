<?php

$including = true;
require_once __DIR__ . '/LinkedList.php';

$linkedList = new LinkedList(10);
$linkedList->append(5);
$linkedList->append(16);
$linkedList->prepend(1);
$linkedList->insert(2, 99);
$linkedList->insert(20, 88);

echo json_encode($linkedList->printList()) . "\n"; // [1, 10, 99, 5, 16, 88]

function reverse(LinkedList $linkedList) {
    if($linkedList->size() <= 0) {
        return;
    }

    $previousNode = $linkedList->head;
    $currentNode = $linkedList->head->next;
    $linkedList->tail = $linkedList->head;

    while($currentNode != null) {
        $temp = $currentNode->next;
        $currentNode->next = $previousNode;
        $previousNode = $currentNode;
        $currentNode = $temp;
    }

    $linkedList->head = $previousNode;
    $linkedList->tail->next = null;
}

reverse($linkedList);

echo json_encode($linkedList->printList()) . "\n"; //[ 88, 16, 5, 10, 1 ]
print_r($linkedList->tail); // 1