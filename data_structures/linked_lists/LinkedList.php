<?php

class Node
{
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }

    public $value;
    public ?Node $next;
}

class LinkedList
{
    public ?Node $head;
    public ?Node $tail;
    public int $length;

    public function __construct($value) {
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
        $node->next = $temp;
        $this->length++;
        return $this;
    }

    public function remove(int $index): self {
        if($this->length == 0) {
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
            $this->length--;
            return $this;
        }

        $currentNode = $this->traverseToIndex($index - 1);
        if($currentNode === null || $currentNode->next === null) {
            return $this;
        }

        $currentNode->next = $currentNode->next->next;
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
