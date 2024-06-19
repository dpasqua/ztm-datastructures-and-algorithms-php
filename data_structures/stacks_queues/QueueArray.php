<?php

class Queue
{
    private array $queue = [];

    public function peek() {
        if(count($this->queue) === 0) {
            return null;
        }

        return $this->queue[0];
    }

    public function enqueue($value): self {
        array_push($this->queue, $value);
        return $this;
    }

    public function dequeue() {
        if(count($this->queue) === 0) {
            return null;
        }

        return array_shift($this->queue);
    }

    public function size(): int {
        return count($this->queue);
    }

    public function isEmpty(): bool {
        return count($this->queue) === 0;
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