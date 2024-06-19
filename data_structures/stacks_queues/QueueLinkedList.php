<?php

class Node {
    public $value;
    public ?Node $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

class Queue
{
    private ?Node $first;
    private ?Node $last;
    private int $length;

    public function __construct()
    {
        $this->first = null;
        $this->last = null;
        $this->length = 0;
    }

    public function peek() {
        if($this->first === null) {
            return null;
        }

        return $this->first->value;
    }

    public function enqueue($value): self {
        $node = new Node($value);

        if($this->first === null) {
            $this->first = $node;
            $this->last = $this->first;
            $this->length++;
            return $this;
        }

        $current = $this->first;
        while($current->next != null) {
            $current = $current->next;
        }

        $current->next = $node;
        $this->length++;
        $this->last = $node;
        return $this;
    }

    public function dequeue() {
        if($this->first === null) {
            return null;
        }

        if($this->length == 1) {
            $value = $this->first->value;
            $this->first = null;
            $this->last = null;
            $this->length--;
            return $value;
        }

        $value = $this->first->value;
        $this->first = $this->first->next;
        $this->length--;
        return $value;
    }

    public function size(): int {
        return $this->length;
    }

    public function isEmpty(): bool {
        return $this->length === 0;
    }
}

$queue = new Queue();
$queue->enqueue("facebook");
$queue->enqueue("google");
$queue->enqueue("microsoft");
$queue->enqueue("amazon");
$queue->enqueue("apple");
$queue->enqueue("nvidia");

var_dump($queue->isEmpty()); //false
var_dump($queue->size()); //6
var_dump($queue->peek()); //facebook
var_dump($queue->dequeue()); //facebook
var_dump($queue->dequeue()); //google
var_dump($queue->dequeue()); //microsoft
var_dump($queue->dequeue()); //amazon
var_dump($queue->dequeue()); //apple
var_dump($queue->dequeue()); //nvidia
var_dump($queue->dequeue()); //null
var_dump($queue->isEmpty()); //true




