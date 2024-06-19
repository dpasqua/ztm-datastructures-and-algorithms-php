<?php

class Node {
    public $value;
    public ?Node $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class Stack
{
    public ?Node $top;
    public ?Node $bottom;
    public int $length;

    public function __construct()
    {
        $this->top = null;
        $this->bottom = null;
        $this->length = 0;
    }

    public function peek() {
        if($this->top == null) {
            return null;
        }
        return $this->top->value;
    }

    public function push($value): self {
        if($this->top == null) {
            $this->top = new Node($value);
            $this->bottom = $this->top;
            $this->length++;
            return $this;
        }

        $node = new Node($value);
        $node->next = $this->top;
        $this->top = $node;
        $this->length++;
        return $this;
    }

    public function pop() {
        if($this->top == null) {
            return null;
        }

        if($this->length == 1) {
            $value = $this->top->value;
            $this->top = null;
            $this->bottom = null;
            $this->length--;
            return $value;
        }

        $value = $this->top->value;
        $this->top = $this->top->next;
        $this->length--;
        return $value;
    }

    public function isEmpty(): bool {
        return $this->length === 0;
    }

    public function size(): int {
        return $this->length;
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

