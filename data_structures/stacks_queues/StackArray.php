<?php

class Stack
{
    private array $stack = [];

    public function push($value): self {
        array_push($this->stack, $value);
        return $this;
    }

    public function peek() {
        return $this->stack[count($this->stack) - 1];
    }

    public function pop() {
        return array_pop($this->stack);
    }

    public function size(): int {
        return count($this->stack);
    }

    public function isEmpty(): bool {
        return count($this->stack) === 0;
    }
}

$stack = new Stack();
$stack->push(5);
$stack->push(10);
$stack->push(15);
$stack->push(20);

var_dump($stack->size()); //4
var_dump($stack->isEmpty()); //false

var_dump($stack->peek()); //20
var_dump($stack->pop()); //20
var_dump($stack->pop()); //15
$stack->push(25);

var_dump($stack->pop()); //25
var_dump($stack->pop()); //10
var_dump($stack->pop()); //5
var_dump($stack->pop()); //null

var_dump($stack->isEmpty()); //true