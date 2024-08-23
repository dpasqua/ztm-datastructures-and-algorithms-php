<?php

class Node {
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
        $this->prev = null;
    }

    public $value;
    public ?Node $next;
    public ?Node $prev;
}

class DoublyLinkedList
{
    public ?Node $head;
    public ?Node $tail;
    public int $length;

    public function __construct($value)
    {
        $this->inicialize($value);
    }

    private function inicialize($value) {
        $node = new Node($value);
        $this->head = $node;
        $this->tail = $this->head;
        $this->length = 1;
    }

    public function append($value): self {
        if($this->head === null) {
            $this->inicialize($value);
            return $this;
        }

        $node = new Node($value);
        $this->tail->next = $node;
        $node->prev = $this->tail;
        $this->tail = $node;
        $this->length++;
        return $this;
    }

    public function prepend($value): self {
        if($this->head === null) {
            $this->inicialize($value);
            return $this;
        }

        $node = new Node($value);
        $node->next = $this->head;
        $this->head->prev = $node;
        $this->head = $node;
        $this->length++;
        return $this;
    }

    public function insert(int $index, $value): self {
        if($index == 0) {
            return $this->prepend($value);
        }

        if($index >= $this->length) {
            return $this->append($value);
        }

        $currentNode = $this->traverseToIndex($index - 1);
        if($currentNode === null) {
            return $this;
        }

        $node = new Node($value);
        $temp = $currentNode->next;

        $currentNode->next = $node;
        $node->prev = $currentNode;
        $node->next = $temp;
        $temp->prev = $node;
        $this->length++;
        return $this;
    }

    public function remove(int $index): self {
        if($this->head === null) {
            return $this;
        }

        if($index == 0 && $this->length == 1) {
            $this->head = null;
            $this->tail = null;
            $this->length = 0;
            return $this;
        }

        if($index == 0) {
            $this->head = $this->head->next;
            $this->head->prev = null;
            $this->length--;
            return $this;
        }

        $currentNode = $this->traverseToIndex($index - 1);
        if($currentNode === null || $currentNode->next === null) {
            return $this;
        }

        $newNext = $currentNode->next->next;
        $newNext->prev = $currentNode;
        $currentNode->next = $newNext;
        $this->length--;
        return $this;
    }

    public function size(): int {
        return $this->length;
    }

    public function printList(): array {
        $list = [];
        $currentNode = $this->head;

        while ($currentNode !== null) {
            $list[] = $currentNode->value;
            $currentNode = $currentNode->next;
        }
        return $list;
    }

    private function traverseToIndex(int $index): ?Node {
        $i = 0;
        $currentNode = $this->head;

        while($currentNode !== null) {
            if($i == $index) {
                return $currentNode;
            }
            $currentNode = $currentNode->next;
            $i++;
        }

        return null;
    }
}

$myLinkedList = new DoublyLinkedList(10);
$myLinkedList->append(5); // 10, 5
$myLinkedList->append(16); //10, 5, 16
$myLinkedList->prepend(1); //1, 10, 5, 16
$myLinkedList->insert(2, 99); //1, 10, 99, 5, 16
$myLinkedList->insert(20, 88); //1, 10, 99, 5, 16, 88

$myLinkedList->remove(2);
echo json_encode($myLinkedList->printList()) . "\n"; // [1, 10, 5, 16, 88]
echo "Double linked list size: " . $myLinkedList->size() . "\n"; //5

$myLinkedList->remove(0);
echo json_encode($myLinkedList->printList()) . "\n"; // [10, 5, 16, 88]
echo "Double linked list size: " . $myLinkedList->size() . "\n"; // 4
